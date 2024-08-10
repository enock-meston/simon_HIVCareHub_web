<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// admin all route
Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/users','viewUsers')->name('users')->middleware(['auth']);
    Route::get('/dashboard','index')->name('dashboard')->middleware(['auth']);
    Route::get('/admin/profile','profile')->name('admin.profile')->middleware(['auth']);
    Route::delete('/admin', 'destroy')->name('admin.logout');
});

Route::controller(UserController::class)->group(function(){
    Route::get('admin/delete/{id}','delete')->name('delete')->middleware('auth');
    Route::post('admin/storeUser','store')->name('storeUser')->middleware(['auth']);
});

// patient
Route::controller(PatientController::class)->group(function(){
    Route::get('admin/patient','index')->name('patient')->middleware('auth');
    Route::post('admin/storePatient','store')->name('storePatient')->middleware(['auth']);


});

// Appointment
Route:: controller(AppointmentController::class)->group(function(){
    Route::get('request/Appointment','index')->name('appointment')->middleware('auth');
    Route::post('admin/approve','approve')->name('approve')->middleware('auth');
    Route::get('admin/delete/{id}','delete')->name('delete')->middleware('auth');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
