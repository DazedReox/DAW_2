<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController as ApiAuthController;
use App\Http\Controllers\Api\EventController as ApiEventController;
use App\Http\Controllers\Api\TicketController as ApiTicketController;
use App\Http\Controllers\Api\PaymentController as ApiPaymentController;

Route::prefix('v1')->group(function () {
    // Autenticación API
    Route::post('login', [ApiAuthController::class, 'login']);
    Route::post('register', [ApiAuthController::class, 'register']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [ApiAuthController::class, 'logout']);

        // Eventos API
        Route::get('events', [ApiEventController::class, 'index']);
        Route::get('events/{id}', [ApiEventController::class, 'show']);
        Route::post('events', [ApiEventController::class, 'store']);
        Route::put('events/{id}', [ApiEventController::class, 'update']);
        Route::delete('events/{id}', [ApiEventController::class, 'destroy']);

        // Tickets API
        Route::get('tickets', [ApiTicketController::class, 'index']);
        Route::post('tickets', [ApiTicketController::class, 'store']);
        Route::get('tickets/{id}', [ApiTicketController::class, 'show']);
        Route::delete('tickets/{id}', [ApiTicketController::class, 'destroy']);

        // Pagos API
        Route::get('payments', [ApiPaymentController::class, 'index']);
        Route::post('payments', [ApiPaymentController::class, 'store']);
        Route::get('payments/{id}', [ApiPaymentController::class, 'show']);
    });
});