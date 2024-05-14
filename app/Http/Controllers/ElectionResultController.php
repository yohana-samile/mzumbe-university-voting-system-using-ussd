<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use DB;
    use App\Models\Position;

    class ElectionResultController extends Controller
    {
        public function voting_result_for($name){
            $position = Position::findOrFail($name);
            $result = DB::select("SELECT COUNT(votes.id) FROM votes, candidates, voting_windows, positions WHERE votes.candidate_id = candidates.id AND candidates.position_id = positions.id AND voting_windows.status = 'open' AND positions.name = '$name' ");
            return view('result/voting_result_for', ([
                'position' => $position,
                'result' => $result
            ]));
        }
    }
