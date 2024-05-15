<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Position;

    class PositionController extends Controller
    {
        public function index(){
            $positions = Position::all();
            return view('position/index', compact('positions'));
        }

        public function add_position(){
            return view('position/add_position');
        }

        public function store_position(Request $request){
            $store = Position::create($request->all());
            if ($store) {
                return redirect()->back()->with('success', 'Your Position Added Successfuly');
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function view_position($id){
            $position = Position::findOrFail($id);
            if (!empty($position)) {
                return view('position/view_position', compact('position'));
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function edit_position($id){
            $position = Position::findOrFail($id);
            if (!empty($position)) {
                return view('position/edit_position', compact('position'));
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function update_position(Request $request){
            $id = $request->input('id');
            $position = Position::findOrFail($id);
            $position->update($request->all());
            if ($position) {
                return redirect()->back()->with('success', 'position Updated Successfuly');
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function destroy_position(Request $request, $id){
            $position = Position::findOrFail($id);
            $position->delete($position);
            if ($position) {
                return redirect()->back()->with('success', 'position Deleted Successfuly');
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }
    }
