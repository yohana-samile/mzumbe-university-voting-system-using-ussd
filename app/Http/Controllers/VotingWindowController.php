<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Programme;
    use App\Models\Unit;
    use App\Models\User;
    use App\Models\Year_of_study;
    use App\Models\Role;
    use App\Models\VotingWindow;
    use App\Models\Position;
    use DB;
    use Illuminate\Support\Facades\Validator;

    class VotingWindowController extends Controller
    {
        public function index(){
            $windows = VotingWindow::get();
            return view('voting_window/index', compact('windows'));
        }

        public function add_voting_window(){
            return view('voting_window/add_voting_window');
        }

        public function store_voting_window(Request $request){
            $voting_window = VotingWindow::create($request->all());
            if ($voting_window) {
                return redirect()->back()->with('success', 'New voting_window Added Successfuly');
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function view_voting_window($id){
            $window = VotingWindow::all();
            if (!empty($window)) {
                return view('voting_window/view_voting_window', compact('window'));
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function edit_voting_window($id){
            $window = VotingWindow::findOrFail($id);
            if (!empty($window)) {
                return view('voting_window/edit_voting_window', compact('window'));
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function update_voting_window(Request $request){
            $id = $request->input('id');
            $voting_window = VotingWindow::findOrFail($id);
            $voting_window->update($request->all());
            if ($voting_window) {
                return redirect()->back()->with('success', 'voting_window Updated Successfuly');
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }
        public function end_voting_process(Request $request, $id){
            $voting_window = VotingWindow::findOrFail($id);
            $voting_window->update($request->all());
            if ($voting_window) {
                return redirect()->back()->with('success', 'voting_window Closed Successfuly');
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function destroy_voting_window(Request $request, $id){
            $voting_window = VotingWindow::findOrFail($id);
            $voting_window->delete($voting_window);
            if ($voting_window) {
                return redirect()->back()->with('success', 'voting_window Deleted Successfuly');
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }
    }
