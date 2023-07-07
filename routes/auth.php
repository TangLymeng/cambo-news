<?php

use App\Http\Controllers\API\FacebookAuthController;
use App\Http\Controllers\API\GithubAuthController;
use App\Http\Controllers\API\GoogleAuthController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\VerifyMobileController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

Route::get('/register-mobile', [RegisteredUserController::class, 'createViaMobile'])
    ->middleware('guest')
    ->name('register.mobile');

Route::post('/register-mobile', [RegisteredUserController::class, 'storeViaMobile'])
    ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');

Route::get('/login-google', [GoogleAuthController::class, 'redirectToProvider'])
    ->middleware('guest')
    ->name('google.login');

Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleCallback'])
    ->middleware('guest')
    ->name('google.login.callback');

Route::get('/login-facebook', [FacebookAuthController::class, 'redirectToProvider'])
    ->middleware('guest')
    ->name('facebook.login');

Route::get('/auth/facebook/callback', [FacebookAuthController::class, 'handleCallback'])
    ->middleware('guest')
    ->name('facebook.login.callback');

Route::get('/login-github', [GithubAuthController::class, 'redirectToProvider'])
    ->middleware('guest')
    ->name('github.login');

Route::get('/auth/github/callback', [GithubAuthController::class, 'handleCallback'])
    ->middleware('guest')
    ->name('github.login.callback');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
    ->middleware('auth')
    ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
    ->middleware('auth');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->group(function () {
    Route::view('verify-mobile', 'auth.verify-mobile')
        ->name('verification-mobile.notice');

    Route::post('verify-mobile', [VerifyMobileController::class, '__invoke'])
        ->middleware(['throttle:6,1'])
        ->name('verification.verify-mobile');
});
