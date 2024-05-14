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


    class ElectionManagerController extends Controller
    {
        public function index(){
            $managers = DB::select("SELECT users.id, users.name as manager_name, users.regstration_number, roles.name AS role_name, programmes.programme_abbreviation, units.unit_abbreviation FROM
                users, programmes, units, roles WHERE
                users.programme_id = programmes.id AND
                programmes.unit_id = units.id AND
                users.role_id = roles.id
            ");
            return view('election_manager/index', compact('managers'));
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

        public function view_election_manager($id){
            $manager = DB::select("SELECT users.id, users.name as manager_name, users.regstration_number, users.phone_number, users.gender, users.email, users.created_at, users.updated_at, roles.name AS role_name, year_of_studies.name AS year, programmes.programme_abbreviation, units.unit_abbreviation FROM
                users, programmes, units, roles, year_of_studies WHERE
                users.programme_id = programmes.id AND
                programmes.unit_id = units.id AND
                users.year_of_studie_id = year_of_studies.id AND
                users.role_id = roles.id AND users.id = '$id'
            ");
            $manager = $manager[0];
            if (!empty($manager)) {
                return view('election_manager/view_election_manager', compact('manager'));
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function edit_election_manager($id){
            $manager = User::findOrFail($id);
            if (!empty($manager)) {
                return view('election_manager/edit_election_manager', compact('manager'));
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function update_election_manager(Request $request){
            $id = $request->input('id');
            $manager = User::findOrFail($id);
            $manager->update($request->all());
            if ($manager) {
                return redirect()->back()->with('success', 'manager details Updated Successfuly');
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function destroy_election_manager(Request $request, $id){
            $manager = User::findOrFail($id);
            $manager->delete($manager);
            if ($manager) {
                return redirect()->back()->with('success', 'election manager Deleted Successfuly');
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }
    }
