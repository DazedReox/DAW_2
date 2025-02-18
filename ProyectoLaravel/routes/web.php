<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\AdminController;

// Rutas de autenticación
tRoute::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('email/verify/{token}', [AuthController::class, 'confirmEmail'])->name('email.verify');

// Rutas protegidas con middleware
tRoute::middleware(['auth'])->group(function () {
    // Eventos
    Route::resource('events', EventController::class);

    // Tickets
    Route::resource('tickets', TicketController::class);

    // Pagos
    Route::resource('payments', PaymentController::class);

    // Ponentes
    Route::resource('speakers', SpeakerController::class);

    // Admin
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/events', [AdminController::class, 'manageEvents'])->name('admin.events');
    Route::get('admin/speakers', [AdminController::class, 'manageSpeakers'])->name('admin.speakers');
    Route::get('admin/users', [AdminController::class, 'manageUsers'])->name('admin.users');
    Route::get('admin/income', [AdminController::class, 'viewIncome'])->name('admin.income');
});
