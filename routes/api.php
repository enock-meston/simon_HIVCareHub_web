<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ResultModelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [PatientController::class, 'login'])->name('login');
Route::post('/make_appointment', [AppointmentController::class, 'store'])->name('make_appointment');
Route::get('/appointment/{id}', [AppointmentController::class, 'view'])->name('appointment');
Route::get('/viewResult/{id}',[ResultModelController::class,'viewResult'])->name('viewResult');
Route::get('/viewMessage/{id}',[MessageController::class,'viewMessage'])->name('viewMessage');
Route::post('/storeMessageApi',[MessageController::class,'storeMessageApi'])->name('storeMessageApi');

Route::get('/countAllDataApi',[DashboardController::class,'countAllDataApi'])->name('countAllDataApi');

Route::get('/getMyDashboardDataApi/{id}',[DashboardController::class,'getMyDashboardDataApi'])->name('getMyDashboardDataApi');

