<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

Route::redirect('/', 'dashboard')->name('home');

Route::middleware('guest')->group(function (): void {
    Route::livewire('register', 'auth.register')->name('register');
    Route::livewire('login', 'auth.login')->name('login');
});

Route::middleware('auth')->group(function (): void {
    Route::post('logout', LogoutController::class)->name('logout');

    Route::view('email/verify', 'auth.verify-email')->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', VerifyEmailController::class)->middleware('signed')->name('verification.verify');
    Route::post('email/verification-notification', EmailVerificationNotificationController::class)->middleware('throttle:6,1')->name('verification.send');

    Route::middleware('verified')->group(function (): void {
        Route::livewire('dashboard', 'dashboard')->name('dashboard');
        Route::livewire('profile', 'profile')->name('profile');
        Route::livewire('sample', 'sample')->name('sample');
    });
});
