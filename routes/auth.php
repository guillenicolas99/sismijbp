<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\DiscipuladoController;
use App\Http\Controllers\GrupoSeguimientoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\PersonaSeguimientoController;
use App\Http\Controllers\RedController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TituloController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::get('/', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('/', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);
    // Route::get('users', [RegisteredUserController::class, 'index'])->name('users');

    //RUTAS ADMIN
    Route::resource('eventos', EventoController::class);
    Route::get('/eventos/getTicketInfo/{codigo}', [EventoController::class, 'getTicketInfo']);
    
    Route::resource('tickets', TicketController::class);
    Route::get('/tickets/asignar/{id}', [TicketController::class, 'asignarTicket'])->name('tickets.asignar');

    Route::resource('personas', PersonaController::class);
    Route::resource('redes', RedController::class)->parameters([
        'redes' => 'red'
    ]);
    Route::get('/api/mentores/{red}', [RedController::class, 'getMentores']);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('titulos', TituloController::class);
    Route::resource('discipulados', DiscipuladoController::class);
    Route::resource('evangelismos', GrupoSeguimientoController::class);
    Route::resource('users', UserController::class);
    Route::resource('personasSeguimiento', PersonaSeguimientoController::class);
    Route::resource('comentarios', ComentarioController::class);
    Route::put('personaSeguimiento/{id}/disable', [PersonaSeguimientoController::class, 'setDisable'])->name('personasSeguimiento.disable');
    Route::put('personaSeguimiento/{id}/enable', [PersonaSeguimientoController::class, 'setEnable'])->name('personasSeguimiento.enable');
});
