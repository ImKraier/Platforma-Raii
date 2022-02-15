<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Views\ViewIndexController;
use App\Http\Controllers\Views\ViewAuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Views\ViewBansController;

Route::get('/', [ViewIndexController::class, 'view'])->name('app.home')->middleware('auth');

Route::get('/login', [ViewAuthController::class, 'viewLogin'])->name('login')->middleware('guest');
Route::post('/login/validate', [LoginController::class, 'authenticate'])->middleware('guest');

Route::get('/register', [ViewAuthController::class, 'viewRegister'])->middleware('guest');
Route::post('/register/validate', [RegisterController::class, 'register'])->middleware('guest');

Route::get('/bans', [ViewBansController::class, 'view'])->name('app.bans')->middleware('auth');

Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');
