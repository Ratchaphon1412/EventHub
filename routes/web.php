<?php


use App\Http\Controllers\ApproveRegisterController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterStepTwoController;
use App\Http\Controllers\KanbanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TeamEventController;
use App\Http\Controllers\HomeController;
use Laravel\Jetstream\Events\TeamEvent;

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

        Route::controller(ApproveRegisterController::class)->group(function () {
            Route::get('/approve_register/{event}', 'join')->name('approve.join');
            Route::post('/approve/status', 'status')->name("approve.status");
            Route::get('/unjoin/{event}', 'unJoin')->name('approve.unjoin');
            Route::get('/notComplate/{event}', 'notComplateQuestion')->name('approve.notComplate');
        });

        Route::controller(QuestionController::class)->group(function () {
            Route::get('/create_question/{event}', 'index')->name('question.create');
            Route::post('/create_question/{event}', 'store')->name('question.store');
            Route::post('/delete_question/{event}/{questionName}', 'delete')->name('question.delete');
            Route::get('/applicant/answer/{event}/{user}', 'applicant')->name('applicant.answer');
            Route::post('/answer_question/{event}', 'answer')->name('question.answer.store');
        });


        Route::controller(EventController::class)->group(function () {
            Route::post('/event/create', 'store')->name('event.create.store');
            Route::get('/event/create', 'create')->name('event.create.view');
            Route::get('/event/edit/{event}',  'edit')->name('event.create.edit');
            Route::put('/event/update/{event}', 'update')->name('event.create.update');
            Route::delete('/event/delete/{event}', 'destroy')->name('event.delete');
            Route::post('/event/enable/question/',  'questionEnable')->name('event.enable.question');
            Route::post('/event/result', 'result')->name('event.result');
            Route::get('/certificate', 'certification')->name('certificate.index');
            Route::get('/event/Team', 'isInTeam')->name('event.isInTeam');
            Route::get('/event/joined', 'isJoinedEvent')->name('event.isJoinedEvent');
        });

        Route::controller(TeamEventController::class)->group(function () {
            Route::get('/team', 'index')->name('teamEvent.index');
            Route::put('/team', 'update')->name('teamEvent.update');
            Route::post('/team/rejectMember', 'destory')->name('teamEvent.delete');
        });
    });
});

Route::controller(HomeController::class)->group(
    function () {
        Route::get('/', 'index')->name('home');
        Route::get('/category/{category}', 'categoryView')->name('category.view');
    }

);

Route::controller(EventController::class)->group(function () {
    Route::get('/event/detail/{event}', 'show')->name('event.detail.show');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('register-step-two', [RegisterStepTwoController::class, 'create'])->name('register-step-two.view');
    Route::post('register-step-two', [RegisterStepTwoController::class, 'store'])->name('register-step-two.store');
});
