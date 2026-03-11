<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

// Route::livewire('/', 'creators-ticketing.ticket-submit-form');

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HeaderController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', [HeaderController::class, 'index'])->name('tickets.front');
    Route::view('/account', 'account.settings')->name('account.settings');
    Route::post('/account/password', [AccountController::class, 'updatePassword'])
    ->name('account.password.update');
});
