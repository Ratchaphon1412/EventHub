<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterStepTwoController;

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
    return view('welcome');
})->name('home');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
 

    Route::group(['middleware'=>['registration_completed']],function(){
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    
    });

    Route::get('register-step-two',[RegisterStepTwoController::class,'create'])->name('register-step-two.view');
    Route::post('register-step-two',[RegisterStepTwoController::class,'store'])->name('register-step-two.store');
});

Route::get('/detail',function (){
    return view('eventDetail');
})->name("EventDetail");

// Route::group(['middleware'=>['auth']],function (){
//     Route::get('register-step-two',[RegisterStepTwoController::class,'create'])->name('register-step-two.view');
//     Route::post('register-step-two',[RegisterStepTwoController::class,'store'])->name('register-step-two.store');
// });

