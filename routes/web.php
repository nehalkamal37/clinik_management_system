<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ProfileController;
use App\Http\Controllers\front\homeController;
use App\Http\Controllers\front\userController;
use App\Http\Controllers\user\makeAppointment;
use App\Http\Controllers\front\frontController;
use App\Http\Controllers\user\recordController;
use App\Http\Controllers\front\twilioController;
use App\Http\Controllers\user\profileController;

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
   // return view('welcome');
   return view('users.front.index');
})->name('home');
  //Route::get('users',[frontController::class,'index'])->name('user.front');


    Route::view('/','users.front.index')->name('home');


Route::middleware(['auth','verified'])->group(function () {

    Route::resource('users',userController::class);

  /*  Route::get('users', function () {
        return view('users.front.index');
     })->name('user.front');*/

    Route::get('/user/dashboard', function () {
        return view('users.dashboard.index');
     })->name('user.dashboard');
    Route::resource('appointment',makeAppointment::class);
    Route::resource('userprofile',profileController::class);
    Route::resource('record',recordController::class);
   
Route::post('/send-whatsapp', [twilioController::class, 'send'])->name('send-whatsapp');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//require __DIR__.'/auth.php';


require __DIR__.'/users.php';
