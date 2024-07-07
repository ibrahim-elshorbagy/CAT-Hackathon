<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\PasswordForgotController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SignUpWith\GoogleContoller;

Route::middleware(['guest','api'])->group(function () {

    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');
    Route::post('/verify', [RegisteredUserController::class, 'verify']);
    Route::post('/resend-code', [RegisteredUserController::class, 'resendCode']);

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');

    Route::post('/forgot-password', [PasswordForgotController::class, 'sendResetCode']);
    Route::post('/forgot-password-resend-code', [PasswordForgotController::class, 'resendCode']);
    Route::post('/verify-reset-code', [PasswordForgotController::class, 'verifyResetCode']);
    Route::post('/forgot-reset-password', [PasswordForgotController::class, 'resetPassword']);

    Route::get('/login-with-google',[GoogleContoller::class, 'redirectToGoogle']);
    Route::get('/google-callback',[GoogleContoller::class, 'handleGoogleCallback']);
    // Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    // Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.store');

});

Route::middleware(['PhoneVerified','auth:sanctum'])->group(function () {

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('testo',function(){
       return response()->json(['message' => 'hello']);

    });
    // Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
    //                 ->middleware(['signed', 'throttle:6,1'])
    //                 ->name('verification.verify');

    // Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    //             ->middleware(['throttle:6,1'])
    //             ->name('verification.send');
});
