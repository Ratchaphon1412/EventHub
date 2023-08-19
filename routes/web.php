<?php

use App\Http\Controllers\AnswerQuestionController;
use App\Http\Controllers\ApplicantAnswerController;
use App\Http\Controllers\ApproveRegisterController;
use App\Http\Controllers\CreateQuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterStepTwoController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\KanbanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TeamEventController;

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

Route::controller(WelcomeController::class)->group(
    function () {
        Route::get('/', 'index')->name('home');
        Route::get('/category/{category}', 'categoryView')->name('category.view');
    }

);

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {


    Route::group(['middleware' => ['registration_completed']], function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('dashboard');
        });

        Route::controller(KanbanController::class)->group(function () {
            Route::get('/kanban/{id}', 'index')->name('kanban.index');
            Route::post('/kanban', 'store')->name('kanban.store');
            Route::post('/kanban/card/delete', 'destroy')->name('kanban.card.delete');
            Route::post('/kanban/card/edit', 'edit')->name('kanban.card.edit');
            Route::post('/kanban/card/update', 'update')->name('kanban.card.update');
        });
    });
});

Route::controller(ApproveRegisterController::class)->group(function () {

    Route::post('/{event}/approve_register', 'update')->name('approve.update');
    Route::get('/{event}/approve_register', 'join')->name('approve.join');
    Route::post('/approve/status', 'status')->name("approve.status");
});


Route::get('/{event}/approve_register/{user}', [
    ApplicantAnswerController::class, 'index'
])->name('applicant.answer');

Route::controller(CreateQuestionController::class)->group(function () {
    Route::get('/{event}/create_question', 'index')->name('question.create');
    Route::post('/{event}/create_question', 'store')->name('question.store');
    Route::post('/{event}/delete_question/{questionName}', 'delete')->name('question.delete');
});

Route::controller(AnswerQuestionController::class)->group(function () {
    Route::get('/{event}/answer_question', 'index')->name('question.answer');
    Route::post('/{event}/answer_question', 'store')->name('question.answer.store');
});


Route::get('/detail', function () {
    return view('eventDetail');
})->name("EventDetail");




Route::controller(EventController::class)->group(function () {
    Route::get('/event/detail/{event}', [EventController::class, 'show'])->name('event.detail.show');
    Route::post('/event/create', [EventController::class, 'store'])->name('event.create.store');
    Route::get('/event/create', [EventController::class, 'create'])->name('event.create.view');
    Route::get('/event/edit/{event}', [EventController::class, 'edit'])->name('event.create.edit');
    Route::put('/event/update/{event}', [EventController::class, 'update'])->name('event.create.update');
    Route::delete('/event/delete/{event}', [EventController::class, 'destroy'])->name('event.delete');
    Route::post('/event/enable/question/',  'questionEnable')->name('event.enable.question');
});

// Route::group(['middleware'=>['auth']],function (){
//     Route::get('register-step-two',[RegisterStepTwoController::class,'create'])->name('register-step-two.view');
//     Route::post('register-step-two',[RegisterStepTwoController::class,'store'])->name('register-step-two.store');
// });

Route::get('/createEvent', function () {
    return view('createEvent');
})->name('createEvent');

Route::get('/event/approve', function () {
    return view('approveEvent');
})->name('approveEvent');

Route::get('/team', [TeamEventController::class, 'index'])->name('teamEvent.index');
Route::put('/team', [TeamEventController::class, 'update'])->name('teamEvent.update');
Route::post('/team/rejectMember', [TeamEventController::class, 'destory'])->name('teamEvent.delete');

Route::get('/cerficate', function () {
    return view('cerficate');
})->name('cerficateUser');

Route::get('/event/joined', function () {
    return view('eventJoined');
})->name('eventJoined');
