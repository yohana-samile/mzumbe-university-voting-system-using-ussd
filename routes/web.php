<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\PositionController;
    use App\Http\Controllers\UnitController;
    use App\Http\Controllers\ProgrammeController;
    use App\Http\Controllers\VoterController;
    use App\Http\Controllers\CandidateController;
    use App\Http\Controllers\VotingWindowController;
    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */

    Route::get('/', function () {
        return view('index');
    });

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // position
    Route::controller(PositionController::class)->group(function () {
        Route::get('position/', 'index');
        Route::get('position/add_position', 'add_position');
        Route::post('store', 'store')->name('store');
        Route::get('position/view_position/{id}', 'view_position')->name('position/view_position');
        Route::get('position/edit_position/{id}', 'edit_position')->name('position/edit_position');
        Route::post('update_position', 'update_position')->name('update_position');
        Route::post('destroy_position/{id}', 'destroy_position')->name('destroy_position');
    })->middleware('auth');

    // unit
    Route::controller(UnitController::class)->group(function () {
        Route::get('unit/', 'index');
        Route::get('unit/add_unit', 'add_unit');
        Route::post('store', 'store')->name('store');
        Route::get('unit/view_unit/{id}', 'view_unit')->name('unit/view_unit');
        Route::get('unit/edit_unit/{id}', 'edit_unit')->name('unit/edit_unit');
        Route::post('update_unit', 'update_unit')->name('update_unit');
        Route::post('destroy_unit/{id}', 'destroy_unit')->name('destroy_unit');
    })->middleware('auth');

    // programme
    Route::controller(ProgrammeController::class)->group(function () {
        Route::get('programme/', 'index');
        Route::get('programme/add_programme', 'add_programme');
        Route::post('store', 'store')->name('store');
        Route::get('programme/view_programme/{id}', 'view_programme')->name('programme/view_programme');
        Route::get('programme/edit_programme/{id}', 'edit_programme')->name('programme/edit_programme');
        Route::post('update_programme', 'update_programme')->name('update_programme');
        Route::post('destroy_programme/{id}', 'destroy_programme')->name('destroy_programme');
    })->middleware('auth');

    // voter
    Route::controller(VoterController::class)->group(function () {
        Route::get('voter/', 'index');
        Route::get('voter/add_voter', 'add_voter');
        Route::post('store', 'store')->name('store');
        Route::get('voter/view_voter/{id}', 'view_voter')->name('voter/view_voter');
        Route::get('voter/edit_voter/{id}', 'edit_voter')->name('voter/edit_voter');
        Route::post('update_voter', 'update_voter')->name('update_voter');
        Route::post('destroy_voter/{id}', 'destroy_voter')->name('destroy_voter');
    })->middleware('auth');

    // candidate
    Route::controller(CandidateController::class)->group(function () {
        Route::get('candidate/', 'index');
        Route::get('candidate/add_candidate', 'add_candidate');
        Route::post('store', 'store')->name('store');
        Route::get('candidate/view_candidate/{id}', 'view_candidate')->name('candidate/view_candidate');
        Route::get('candidate/edit_candidate/{id}', 'edit_candidate')->name('candidate/edit_candidate');
        Route::post('update_candidate', 'update_candidate')->name('update_candidate');
        Route::post('destroy_candidate/{id}', 'destroy_candidate')->name('destroy_candidate');
    })->middleware('auth');

    // voting_window
    Route::controller(VotingWindowController::class)->group(function () {
        Route::get('voting_window/', 'index');
        Route::get('voting_window/add_voting_window', 'add_voting_window');
        Route::post('store', 'store')->name('store');
        Route::get('voting_window/view_voting_window/{id}', 'view_voting_window')->name('voting_window/view_voting_window');
        Route::get('voting_window/edit_voting_window/{id}', 'edit_voting_window')->name('voting_window/edit_voting_window');
        Route::post('update_voting_window', 'update_voting_window')->name('update_voting_window');
        Route::post('end_voting_process/{id}', 'end_voting_process')->name('end_voting_process');
        Route::post('destroy_voting_window/{id}', 'destroy_voting_window')->name('destroy_voting_window');
    })->middleware('auth');