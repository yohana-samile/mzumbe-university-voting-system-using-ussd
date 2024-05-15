<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use DB;
    use App\Models\User;
    use App\Models\Vote;
    use App\Models\VotingWindow;
    use App\Models\Candidate;
    use Illuminate\Support\Facades\Validator;

    class VotingProcessController extends Controller
    {
        public function vote_demo(){
            $president_candidates = DB::select("SELECT candidates.name, candidates.id FROM candidates, positions WHERE candidates.position_id = positions.id AND positions.name = 'president' AND candidates.result_publication = 'unpublished' ");
            $senator_candidates = DB::select("SELECT candidates.name, candidates.id FROM candidates, positions WHERE candidates.position_id = positions.id AND positions.name = 'senator' AND candidates.result_publication = 'unpublished' ");
            $fr_candidates = DB::select("SELECT candidates.name, candidates.id FROM candidates, positions WHERE candidates.position_id = positions.id AND positions.name = 'fr' AND candidates.result_publication = 'unpublished' ");
            $voting_window_id = VotingWindow::select('id')->where('status', 'open')->first();
            return view('vote_demo', [
                'president_candidates' => $president_candidates,
                'senator_candidates' => $senator_candidates,
                'fr_candidates' => $fr_candidates,
                'voting_window_id' => $voting_window_id
            ]);
        }

        public function submit_vote(Request $request){
            $data = $request->validate([
                'regstration_number' => 'required|string',
                'president_candidate' => 'required|exists:candidates,id',
                'senetor_candidate' => 'required|exists:candidates,id',
                'fr_candidate' => 'required|exists:candidates,id',
            ]);
            $voting_window_id = VotingWindow::select('id')->where('status', 'open')->first();

            $user = $data['regstration_number'];
            $verify_voter = User::where('regstration_number', $user)->first();
            if (!$verify_voter) {
                return redirect()->back()->withErrors('error', 'Invalid Registration Number, Try Again!');
            }

            $existing_vote = Vote::where('user_id', $verify_voter->id)->first();
            if ($existing_vote) {
                return redirect()->back()->withErrors('error', 'You have already voted, Thank You!');
            }

            try {
                DB::beginTransaction();

                // Insert votes for president, senator, and FR
                $president_vote = Vote::create([
                    'user_id' => $verify_voter->id,
                    'candidate_id' => $data['president_candidate'],
                    'voting_window_id' => $voting_window_id->id,
                ]);

                $senator_vote = Vote::create([
                    'user_id' => $verify_voter->id,
                    'candidate_id' => $data['senetor_candidate'],
                    'voting_window_id' => $voting_window_id->id,
                ]);

                $fr_vote = Vote::create([
                    'user_id' => $verify_voter->id,
                    'candidate_id' => $data['fr_candidate'],
                    'voting_window_id' => $voting_window_id->id,
                ]);

                // Update total votes for each candidate
                $this->updateTotalVotes($data['president_candidate']);
                $this->updateTotalVotes($data['senetor_candidate']);
                $this->updateTotalVotes($data['fr_candidate']);

                DB::commit();

                return redirect()->back()->with('success', 'Your vote has been submitted successfully!');
            }
            catch (\Exception $e) {
                DB::rollback();
                return redirect()->back()->withErrors('error', 'Failed to submit vote. Please try again.');
            }
        }

        private function updateTotalVotes($candidate_id) {
            $total_votes = Vote::where('candidate_id', $candidate_id)->count();
            Candidate::where('id', $candidate_id)->update(['total_votes' => $total_votes]);
        }
    }
