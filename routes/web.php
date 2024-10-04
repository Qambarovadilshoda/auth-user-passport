<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PassportController;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/passports/create', [PassportController::class, 'create'])->name('passports.create');
Route::post('/passports/store', [PassportController::class, 'store'])->name('passports.store');
Route::get('/passports/{id}', [PassportController::class, 'show'])->name('passports.show');
Route::get('/passports/{id}/edit', [PassportController::class, 'edit'])->name('passports.edit')->middleware('checkAuth');
Route::put('/passports/{id}', [PassportController::class, 'update'])->name('passports.update');
Route::delete('/passports/{id}/destroy', [PassportController::class, 'destroy'])->name('passports.destroy')->middleware('checkAuth');

Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm')->middleware('checkRegister');
Route::post('/register', [AuthController::class, 'handleRegister'])->name('handleRegister');
Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm')->middleware('checkRegister');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('handleLogin');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
