
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\front\homeController;
use App\Http\Controllers\Dashboard\adminController;
use App\Http\Controllers\dashboard\contactController;
use App\Http\Controllers\Dashboard\doctorsController;
use App\Http\Controllers\Dashboard\userRecordController;
use App\Http\Controllers\Appointments\docAppointmentsController;
use App\Http\Controllers\Appointments\userAppointmentsController;
use App\Http\Controllers\Appointments\filterAppointmentsController;

Route::view('user/signup','users.auth.signup')->name('user-register');
/*
Route::get('/users', function () {
    return view('users.front.index');
})->middleware(['auth', 'verified'])->name('user.front');
*/
Route::middleware(['auth','verified'])->group(function () {

//    Route::view('users','users.front.index');
 // Route::get('users',[frontController::class,'index'])->name('k');

});

Route::get('/admins', function () {
    return view('admins.dashboard.index');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

Route::view('user/log','users.auth.login')->name('login');
    //Route::resource('users',homeController::class);


Route::middleware(['auth:admin','verified'])->group(function (){
    Route::resource('admin',adminController::class);
    Route::resource('doctors',doctorsController::class);
    Route::resource('doctorsAppointments',docAppointmentsController::class);
    Route::get('filterApp',[filterAppointmentsController::class,'index'])->name('filterApp'); 
    Route::resource('userAppointment',userAppointmentsController::class);
    Route::get('filterUser',[filterAppointmentsController::class,'userApp'])->name('filterUser'); 
    Route::resource('userRecord',userRecordController::class);
    Route::get('filterRecord',[filterAppointmentsController::class,'userRecord'])->name('filterRecord'); 
    Route::resource('contcts',contactController::class);
   // Route::view('admins','users.front.index')->name('home');
    //Route::resource('users',homeController::class);
    Route::resource('doc',homeController::class);
    Route::resource('contacts',contactController::class);

    //Route::resource('users',homeController::class);

});



require __DIR__.'/auth.php';
