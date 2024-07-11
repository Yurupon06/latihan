<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('password/forgot', [AuthController::class, 'showForgotForm'])->name('password.forgot');
Route::post('password/forgot', [AuthController::class, 'forgot'])->name('email.search');
Route::post('password/reset', [AuthController::class, 'reset'])->name('password.update');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('dashboard', \App\Http\Controllers\DashboardController::class);
    Route::resource('guru', \App\Http\Controllers\GuruController::class);
    Route::resource('siswa', \App\Http\Controllers\SiswaController::class);
});


Route::middleware(['auth', 'customer'])->group(function () {
    Route::resource('user', \App\Http\Controllers\UserController::class);
});



