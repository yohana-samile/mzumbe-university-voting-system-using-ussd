<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use DB;
    use App\Models\Position;
    use App\Models\Candidate;
    use App\Models\VotingWindow;

    class ElectionResultController extends Controller
    {
        public function index(){
            $results = DB::select("SELECT candidates.name as candidate_name, candidates.id, candidates.wining_status, candidates.total_votes, positions.name AS position_name FROM candidates, positions WHERE candidates.position_id = positions.id ");
            return view('result.index', compact('results'));
        }
        public function voting_result_for($id){
            $position = Position::findOrFail($id);
            $candidates = DB::select("SELECT candidates.name as candidate_name, candidates.id, candidates.wining_status, candidates.total_votes FROM candidates, positions WHERE candidates.position_id = positions.id AND positions.id = '$id' ");
            $window_status = VotingWindow::orderBy('created_at', 'desc')->first();
            $highest_candidate = Candidate::select('total_votes')
                ->where('result_publication', 'unpublished')
                ->where('position_id', $id)
                ->orderBy('total_votes', 'desc')
                ->first();
            $highest_total_votes = $highest_candidate ? $highest_candidate->total_votes : 0;
            // $result = DB::select("SELECT COUNT(votes.id) AS count FROM votes, candidates, voting_windows, positions WHERE votes.candidate_id = candidates.id AND candidates.position_id = positions.id AND voting_windows.status = 'open' AND positions.id = '$id' ");
            // $result = $result[0];
            return view('result.voting_result_for', ([
                'position' => $position,
                // 'result' => $result,
                'window_status' => $window_status,
                'highest_total_votes' => $highest_total_votes,
                'candidates' => $candidates
            ]));
        }

        public function publish_voting_result(Request $request){
            $total_votes = $request->input('total_votes');
            $publish_result = DB::update("UPDATE `candidates` SET `wining_status` = 1 WHERE `candidates`.`total_votes` = '$total_votes'");
            if ($publish_result) {
                $end_election = DB::update("UPDATE `candidates` SET `result_publication` = 'published' WHERE `candidates`.`result_publication` = 'unpublished' ");
                if ($end_election) {
                    return redirect()->back()->with('success', 'Result Published Successfuly, Selection Mark Complite');
                }
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }
    }
