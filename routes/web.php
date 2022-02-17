<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Views\ViewIndexController;
use App\Http\Controllers\Views\ViewAuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Views\ViewBansController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Views\ViewProfileController;

Route::middleware(['auth', 'isEmailVerified'])->group(function () {
    Route::get('/', [ViewIndexController::class, 'view'])->name('app.home');
    Route::get('/bans', [ViewBansController::class, 'view'])->name('app.bans');
    Route::get('/logout', [LoginController::class, 'logout']);

    Route::prefix('profile')->group(function () {
        Route::get('/', [ViewProfileController::class, 'viewProfile'])->name('app.profile');
        Route::get('/{user}', [ViewProfileController::class, 'viewUserProfile'])->name('app.profile.user');
    });

    Route::prefix('admin')->middleware('isAdmin')->group(function () {
        Route::prefix('/users')->group(function () {
            Route::get('/', [AdminController::class, 'viewUsers'])->name('app.admin.users');
            Route::get('/{user}', [AdminController::class, 'viewManageUser'])->name('app.admin.user');
        });
        Route::prefix('tickets')->group(function () {
            Route::get('/', [AdminController::class, 'viewTickets'])->name('app.admin.tickets');
            Route::get('/{ticket}', [AdminController::class, 'viewManageTicket'])->name('app.admin.ticket');
            Route::post('/delete-ticket/{id}', [TicketsController::class, 'deleteTicket'])->name('app.delete.ticket');
        });
        Route::prefix('reports')->group(function () {
            Route::get('/', [AdminController::class, 'viewReports'])->name('app.admin.reports');
            Route::get('/{report}', [AdminController::class, 'viewManageReport'])->name('app.admin.report');
            Route::post('/send-answer', [ReportController::class, 'sendAnswer'])->name('app.admin.report.send-answer');
        });
    });

    Route::prefix('tickets')->group(function () {
        Route::get('/', [TicketsController::class, 'viewApp'])->name('app.tickets');
        Route::get('/{id}', [TicketsController::class, 'manageTicket'])->name('app.manage.ticket');
        Route::post('/close-ticket/{id}', [TicketsController::class, 'closeTicket'])->name('app.close.ticket');
        Route::post('/create-ticket', [TicketsController::class, 'createTicket'])->name('app.create.ticket');
        Route::post('/send-comment', [TicketsController::class, 'sendComment'])->name('app.create.comment');
    });

    Route::prefix('reports')->group(function () {
        Route::get('/', [ReportController::class, 'viewReports'])->name('app.reports');
        Route::get('/{report}', [ReportController::class, 'manageReport'])->name('app.manage.report');
        Route::post('/create-report', [ReportController::class, 'createReport'])->name('app.create.report');
    });

    Route::prefix('email')->group(function () {
        Route::get('confirmation/{token}', [ViewAuthController::class, "confirmation"])->name('app.email.confirmation');
    });

    Route::get('verify-email', [ViewAuthController::class, 'verifyEmail'])->name('app.verify.email');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [ViewAuthController::class, 'viewLogin'])->name('app.login');
    Route::post('/login/validate', [LoginController::class, 'authenticate']);

    Route::get('/register', [ViewAuthController::class, 'viewRegister'])->name('app.register');
    Route::post('/register/validate', [RegisterController::class, 'register']);
});
