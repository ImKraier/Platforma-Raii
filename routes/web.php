<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Views\ViewIndexController;
use App\Http\Controllers\Views\ViewAuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Views\ViewBansController;
use App\Http\Controllers\AdminController;

Route::middleware('auth')->group(function () {
    Route::get('/', [ViewIndexController::class, 'view'])->name('app.home');
    Route::get('/bans', [ViewBansController::class, 'view'])->name('app.bans');
    Route::get('/logout', [LoginController::class, 'logout']);
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [ViewAuthController::class, 'viewLogin'])->name('app.login');
    Route::post('/login/validate', [LoginController::class, 'authenticate']);

    Route::get('/register', [ViewAuthController::class, 'viewRegister'])->name('app.register');
    Route::post('/register/validate', [RegisterController::class, 'register']);
});

Route::prefix('admin')->group(function () {
    Route::get('/users', [AdminController::class, 'viewUsers'])->name('app.admin.users');
});
