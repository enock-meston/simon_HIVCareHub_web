<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [PatientController::class, 'login'])->name('login');
Route::post('/make_appointment', [AppointmentController::class, 'store'])->name('make_appointment');
Route::get('/appointment/{id}', [AppointmentController::class, 'view'])->name('appointment');

