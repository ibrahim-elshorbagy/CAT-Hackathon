<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\PasswordForgotController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SignUpWith\GoogleContoller;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Company\Job\CjobController;
use App\Http\Controllers\RoadmapScheduleController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;



Route::middleware(['guest','api'])->group(function () {

    // Register Routes
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');
    Route::post('/verify', [RegisteredUserController::class, 'verify']);
    Route::post('/resend-code', [RegisteredUserController::class, 'resendCode']);

    // Login Routes
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');

    // Forgot Password Routes
    Route::post('/forgot-password', [PasswordForgotController::class, 'sendResetCode']);
    Route::post('/forgot-password-resend-code', [PasswordForgotController::class, 'resendCode']);
    Route::post('/verify-reset-code', [PasswordForgotController::class, 'verifyResetCode']);
    Route::post('/forgot-reset-password', [PasswordForgotController::class, 'resetPassword']);

    // Login with Google
    Route::get('/login-with-google',[GoogleContoller::class, 'redirectToGoogle']);
    Route::get('/google-callback',[GoogleContoller::class, 'handleGoogleCallback']);

    //Show Company
    Route::get('/companies/{company}/info',[CompanyController::class,'show']);
    Route::get('/companies',[CompanyController::class,'index']);

    //Show Job
    Route::get('/jobs/{job}/info',[CjobController::class,'show']);
    Route::get('/jobs',[CjobController::class,'index']);
    Route::get('/companies/{companyId}/jobs',[CjobController::class,'companyJobs']);

        Route::get('/roadmaps', [RoadmapScheduleController::class, 'getAllRoadmaps']);
    Route::get('/roadmaps/{roadmapId}/contents', [RoadmapScheduleController::class, 'getRoadmapContents']);


});

//------------------------------------Auth User----------------------------------------//

Route::middleware(['PhoneVerified','auth:sanctum'])->group(function () {

    // Logout Routes
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Profile Routes
    Route::put('/change-password',[ProfileController::class,'updatePassword']);
    Route::put('/change-image',[ProfileController::class,'ChangeImage']);
    Route::put('/change-name',[ProfileController::class,'ChangeName']);


    Route::post('/create-schedule', [RoadmapScheduleController::class, 'createSchedule']);
    Route::get('/my-schedule', [RoadmapScheduleController::class, 'getSchedule']);


});

//----------------------------------Admin Dashbaord --------------------------------------------//
Route::middleware(['auth:sanctum','role:user'])->group(function () {
    // Company Routes
    Route::apiResource('/company',CompanyController::class)->except(['show','index']);

    //Job Routes
    Route::apiResource('/job',CjobController::class)->except(['show','index']);

});
