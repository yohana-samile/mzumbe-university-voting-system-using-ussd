<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Unit;

    class UnitController extends Controller
    {
        public function index(){
            $units = Unit::all();
            return view('unit/index', compact('units'));
        }

        public function add_unit(){
            return view('unit/add_unit');
        }

        public function store_unit(Request $request){
            $store = Unit::create($request->all());
            if ($store) {
                return redirect()->back()->with('success', 'Your unit Added Successfuly');
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function view_unit($id){
            $unit = Unit::findOrFail($id);
            if (!empty($unit)) {
                return view('unit/view_unit', compact('unit'));
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function edit_unit($id){
            $unit = Unit::findOrFail($id);
            if (!empty($unit)) {
                return view('unit/edit_unit', compact('unit'));
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function update_unit(Request $request){
            $id = $request->input('id');
            $unit = Unit::findOrFail($id);
            $unit->update($request->all());
            if ($unit) {
                return redirect()->back()->with('success', 'unit Updated Successfuly');
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function destroy_unit(Request $request, $id){
            $unit = Unit::findOrFail($id);
            $unit->delete($unit);
            if ($unit) {
                return redirect()->back()->with('success', 'unit Deleted Successfuly');
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }
    }
