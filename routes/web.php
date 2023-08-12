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

Route::get('/',[WelcomeController::class,'index'])->name('home');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {


    Route::group(['middleware'=>['registration_completed']],function(){
        Route::controller(DashboardController::class)->group(function(){
            Route::get('/dashboard','index')->name('dashboard');
        });

        Route::controller(KanbanController::class)->group(function (){
            Route::get('/kanban/{id}','index')->name('kanban.index');
            Route::post('/kanban','store')->name('kanban.store');
            Route::post('/kanban/card/delete','destroy')->name('kanban.card.delete');
            Route::post('/kanban/card/edit','edit')->name('kanban.card.edit');
            Route::post('/kanban/card/update','update')->name('kanban.card.update');

        });

    });



    Route::get('register-step-two',[RegisterStepTwoController::class,'create'])->name('register-step-two.view');
    Route::post('register-step-two',[RegisterStepTwoController::class,'store'])->name('register-step-two.store');
});

Route::controller(ApproveRegisterController::class)->group(function (){
    Route::get('/{event}/approve_register', 'index')->name('approve.register');
    Route::post('/{event}/approve_register', 'update')->name('approve.update');
});


Route::get('/{event}/approve_register/{applicant}', [
    ApplicantAnswerController::class, 'index'
])->name('applicant.answer');

Route::controller(CreateQuestionController::class)->group(function (){
    Route::get('/{event}/create_question', 'index')->name('question.create');
    Route::post('/{event}/create_question', 'store')->name('question.store');
});

Route::controller(AnswerQuestionController::class)->group(function (){
    Route::get('/{event}/answer_question', 'index')->name('question.answer');
    Route::post('/{event}/answer_question', 'store')->name('question.answer.store');
});


Route::get('/detail',function (){
    return view('eventDetail');
})->name("EventDetail");




// Route::group(['middleware'=>['auth']],function (){
//     Route::get('register-step-two',[RegisterStepTwoController::class,'create'])->name('register-step-two.view');
//     Route::post('register-step-two',[RegisterStepTwoController::class,'store'])->name('register-step-two.store');
// });

Route::get('/createEvent',function(){
    return view('createEvent');
})->name('createEvent');
