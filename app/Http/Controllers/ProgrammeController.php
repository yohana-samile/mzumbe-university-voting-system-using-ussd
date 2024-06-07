<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Programme;
    use App\Models\Unit;

    class ProgrammeController extends Controller
    {
        public function index(){
            $programmes = Programme::all();
            return view('programme/index', compact('programmes'));
        }

        public function add_programme(){
            $units = Unit::all();
            return view('programme/add_programme', compact('units'));
        }

        public function store_programme(Request $request){
            $store = Programme::create($request->all());
            if ($store) {
                return redirect()->back()->with('success', 'Your programme Added Successfuly');
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function view_programme($id){
            $programme = Programme::findOrFail($id);
            if (!empty($programme)) {
                return view('programme/view_programme', compact('programme'));
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function edit_programme($id){
            $programme = Programme::findOrFail($id);
            if (!empty($programme)) {
                return view('programme/edit_programme', compact('programme'));
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function update_programme(Request $request){
            $id = $request->input('id');
            $programme = Programme::findOrFail($id);
            $programme->update($request->all());
            if ($programme) {
                return redirect()->back()->with('success', 'programme Updated Successfuly');
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function destroy_programme(Request $request, $id){
            $programme = Programme::findOrFail($id);
            $programme->delete($programme);
            if ($programme) {
                return redirect()->back()->with('success', 'programme Deleted Successfuly');
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }
    }
