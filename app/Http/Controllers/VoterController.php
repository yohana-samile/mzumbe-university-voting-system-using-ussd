<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Programme;
    use App\Models\Unit;
    use App\Models\User;
    use App\Models\Year_of_study;
    use App\Models\Role;
    use DB;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Hash;

    class VoterController extends Controller
    {
        public function index(){
            $voters = DB::select("SELECT users.id, users.name as voter_name, users.regstration_number, programmes.programme_abbreviation, units.unit_abbreviation FROM
                users, programmes, units WHERE
                users.programme_id = programmes.id AND
                programmes.unit_id = units.id;
            ");
            return view('voter/index', compact('voters'));
        }

        public function add_voter(){
            $programmes = Programme::all();
            $years = Year_of_study::all();
            return view('voter/add_voter', ([
                'programmes' => $programmes,
                'years' => $years
            ]));
        }

        public function store(Request $request){
            $data = $request->validate([
                'name' => 'required|string',
                'gender' => 'required|string',
                'phone_number' => 'required|string',
                'year_of_studie_id' => 'required',
                'programme_id' => 'required',
                'regstration_number' => 'required',
                'password' => 'required',
            ]);
            $nameParts = explode(' ', $data['name']);
            $username = strtolower($nameParts[0]);
            $domain = '';
            if (count($nameParts) > 1) {
                $domain = strtolower(implode('', array_slice($nameParts, 1)));
            }
            $generated_email = $username . '@' . $domain . 'mustudent.ac.tz';
            $store_user = User::create([
                'name' => $data['name'],
                'gender' => $data['gender'],
                'phone_number' => $data['phone_number'],
                'email' => $generated_email,
                'role_id' => 2,
                'year_of_studie_id' => $data['year_of_studie_id'],
                'regstration_number' => $data['regstration_number'],
                'programme_id' => $data['programme_id'],
                'password' => Hash::make($data['password']),
            ]);
            if ($store_user) {
                return redirect()->back()->with('success', 'Your voter Added Successfuly');
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function view_voter($id){
            $voter = DB::select("SELECT users.id, users.name as voter_name, users.regstration_number, users.phone_number, users.gender, users.email, users.created_at, users.updated_at, roles.name AS role_name, year_of_studies.name AS year, programmes.programme_abbreviation, units.unit_abbreviation FROM
                users, programmes, units, roles, year_of_studies WHERE
                users.programme_id = programmes.id AND
                programmes.unit_id = units.id AND
                users.year_of_studie_id = year_of_studies.id AND
                users.role_id = roles.id AND users.id = '$id'
            ");
            $voter = $voter[0];
            if (!empty($voter)) {
                return view('voter/view_voter', compact('voter'));
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function edit_voter($id){
            $voter = User::findOrFail($id);
            if (!empty($voter)) {
                return view('voter/edit_voter', compact('voter'));
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function update_voter(Request $request){
            $id = $request->input('id');
            $voter = User::findOrFail($id);
            $voter->update($request->all());
            if ($voter) {
                return redirect()->back()->with('success', 'voter Updated Successfuly');
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function destroy_voter(Request $request, $id){
            $voter = User::findOrFail($id);
            $voter->delete($voter);
            if ($voter) {
                return redirect()->back()->with('success', 'voter Deleted Successfuly');
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }
    }
