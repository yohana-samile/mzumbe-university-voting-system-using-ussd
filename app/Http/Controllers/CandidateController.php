<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Programme;
    use App\Models\Unit;
    use App\Models\User;
    use App\Models\Year_of_study;
    use App\Models\Role;
    use App\Models\Candidate;
    use App\Models\Position;
    use DB;
    use Illuminate\Support\Facades\Validator;

    class CandidateController extends Controller
    {
        public function index(){
            $candidates = DB::select("SELECT users.id as user_id, candidates.id, users.name as candidate_name, users.regstration_number, users.phone_number, users.gender, users.email, users.created_at, users.updated_at, positions.name AS position_name, year_of_studies.name AS year, programmes.programme_abbreviation, units.unit_abbreviation FROM
                users, programmes, units, positions, year_of_studies, candidates WHERE
                users.programme_id = programmes.id AND
                programmes.unit_id = units.id AND
                users.year_of_studie_id = year_of_studies.id AND
                candidates.name = users.id
            ");
            return view('candidate/index', compact('candidates'));
        }

        public function add_candidate(){
            $users = User::all();
            $positions = Position::all();
            return view('candidate/add_candidate', ([
                'users' => $users,
                'positions' => $positions
            ]));
        }

        public function store_candidate(Request $request){
            $candidate = Candidate::create($request->all());
            if ($candidate) {
                return redirect()->back()->with('success', 'New candidate Added Successfuly');
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function view_candidate($id){
            $candidate = DB::select("SELECT candidates.id, users.name as candidate_name, users.regstration_number, users.phone_number, users.gender, users.email, users.created_at, users.updated_at, positions.name AS position_name, year_of_studies.name AS year, programmes.programme_abbreviation, units.unit_abbreviation FROM
                users, programmes, units, positions, year_of_studies, candidates WHERE
                users.programme_id = programmes.id AND
                programmes.unit_id = units.id AND
                users.year_of_studie_id = year_of_studies.id AND
                candidates.name = users.id and users.id = '$id'
            ");
            $candidate = $candidate[0];
            if (!empty($candidate)) {
                return view('candidate/view_candidate', compact('candidate'));
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function edit_candidate($id){
            $candidate = Candidate::findOrFail($id);
            $users = User::all();
            $positions = Position::all();
            if (!empty($candidate)) {
                return view('candidate/edit_candidate', ([
                    'users' => $users,
                    'positions' => $positions,
                    'candidate' => $candidate
                ]));
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function update_candidate(Request $request){
            $id = $request->input('id');
            $candidate = Candidate::findOrFail($id);
            $candidate->update($request->all());
            if ($candidate) {
                return redirect()->back()->with('success', 'candidate Updated Successfuly');
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function destroy_candidate(Request $request, $id){
            $candidate = Candidate::findOrFail($id);
            $candidate->delete($candidate);
            if ($candidate) {
                return redirect()->back()->with('success', 'candidate Deleted Successfuly');
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }
    }
