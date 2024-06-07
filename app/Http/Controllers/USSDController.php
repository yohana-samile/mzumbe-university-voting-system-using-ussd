<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Candidate;
use App\Models\Vote;
use App\Models\VotingWindow;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use AfricasTalking\SDK\AfricasTalking;

class USSDController extends Controller
{
    protected $africasTalking;
    protected $presidentCandidates;
    protected $senatorCandidates;
    protected $frCandidates;

    public function __construct() {
        $this->africasTalking = new AfricasTalking(config('africastalking.username'), config('africastalking.api_key'));

        $this->presidentCandidates = DB::table('candidates')
            ->join('positions', 'candidates.position_id', '=', 'positions.id')
            ->where('positions.name', 'president')
            ->where('candidates.result_publication', 'unpublished')
            ->select('candidates.name as candidate_name', 'candidates.id')
            ->limit(2)
            ->get();

        $this->senatorCandidates = DB::table('candidates')
            ->join('positions', 'candidates.position_id', '=', 'positions.id')
            ->where('positions.name', 'senator')
            ->where('candidates.result_publication', 'unpublished')
            ->select('candidates.name as candidate_name', 'candidates.id')
            ->limit(2)
            ->get();

        $this->frCandidates = DB::table('candidates')
            ->join('positions', 'candidates.position_id', '=', 'positions.id')
            ->where('positions.name', 'fr')
            ->where('candidates.result_publication', 'unpublished')
            ->select('candidates.name as candidate_name', 'candidates.id')
            ->limit(2)
            ->get();
    }

    public function handleUssd(Request $request) {
        Log::info('USSD request received', $request->all());

        try {
            $sessionId   = $request->input('sessionId');
            $serviceCode = $request->input('serviceCode');
            $phoneNumber = $request->input('phoneNumber');
            $text        = $request->input('text');

            $textArray = explode('*', $text);
            $level = count($textArray);

            if ($level == 1) {
                // Prompt for registration number
                $response = "CON Enter Your Reg.no";
            } elseif ($level == 2) {
                // Validate registration number
                $regNo = $textArray[1];
                $user = User::where('regstration_number', $regNo)->first();

                if ($user) {
                    // Check if user has already voted
                    $vote = Vote::join('users', 'votes.user_id', '=', 'users.id')
                        ->where('users.regstration_number', $regNo)
                        ->select('votes.*', 'users.id')
                        ->first();

                    $voting_window = VotingWindow::where('status', 'open')->first();

                    if ($vote) {
                        $response = "END You have already voted.";
                    } elseif (!$voting_window) {
                        $response = "END Voting is currently closed.";
                    } else {
                        // Prompt for president selection
                        $response = "CON Choose President:\n";
                        foreach ($this->presidentCandidates as $index => $president) {
                            $response .= ($index + 1) . ". " . $president->candidate_name . "\n";
                        }
                    }
                } else {
                    $response = "END Invalid registration number.";
                }
            } elseif ($level == 3) {
                // Handle president selection and prompt for senator
                $regNo = $textArray[1];
                $president = $textArray[2];

                $response = "CON Choose Senator:\n";
                foreach ($this->senatorCandidates as $index => $senator) {
                    $response .= ($index + 1) . ". " . $senator->candidate_name . "\n";
                }
            } elseif ($level == 4) {
                // Handle senator selection and prompt for fr
                $regNo = $textArray[1];
                $president = $textArray[2];
                $senator = $textArray[3];

                $response = "CON Choose FR:\n";
                foreach ($this->frCandidates as $index => $fr) {
                    $response .= ($index + 1) . ". " . $fr->candidate_name . "\n";
                }
            }
            elseif ($level == 5) {
                // Handle fr selection and save the vote
                $regNo = $textArray[1];
                $president = $textArray[2];
                $senator = $textArray[3];
                $fr = $textArray[4];

                $user = User::where('regstration_number', $regNo)->first();
                $presidentCandidate = $this->presidentCandidates[$president - 1];
                $senatorCandidate = $this->senatorCandidates[$senator - 1];
                $frCandidate = $this->frCandidates[$fr - 1];

                $voting_window = VotingWindow::where('status', 'open')->first();

                try {
                    DB::beginTransaction();

                    // Insert votes for president, senator, and FR
                    $president_vote = Vote::create([
                        'user_id' => $user->id,
                        'candidate_id' => $presidentCandidate->id,
                        'voting_window_id' => $voting_window->id,
                    ]);

                    $senator_vote = Vote::create([
                        'user_id' => $user->id,
                        'candidate_id' => $senatorCandidate->id,
                        'voting_window_id' => $voting_window->id,
                    ]);

                    $fr_vote = Vote::create([
                        'user_id' => $user->id,
                        'candidate_id' => $frCandidate->id,
                        'voting_window_id' => $voting_window->id,
                    ]);

                    // Update total votes for each candidate
                    $this->updateTotalVotes($presidentCandidate->id);
                    $this->updateTotalVotes($senatorCandidate->id);
                    $this->updateTotalVotes($frCandidate->id);


                    DB::commit();
                    $response = "END Thank you for voting.";
                }
                catch (\Exception $e) {
                    DB::rollback();
                    $response = "END Something went wrong. Please try again later.";
                }
            }

            Log::info('USSD response', ['response' => $response]);

        }
        catch (\Exception $e) {
            Log::error('USSD error', ['error' => $e->getMessage()]);
            $response = "END Something went wrong. Please try again later.";
        }

        return response($response)->header('Content-Type', 'text/plain');
    }

    private function updateTotalVotes($candidate_id) {
        $total_votes = Vote::where('candidate_id', $candidate_id)->count();
        Candidate::where('id', $candidate_id)->update(['total_votes' => $total_votes]);
    }
}
