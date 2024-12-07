<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\AuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::view("/", "welcome")->name('welcome');

//Welcome Form------------------------------------------------------------------------------------------------
Route::middleware("auth")->group(function()
{
    Route::view("/dashboard", "layouts.dashboard")->name('dashboard')->middleware('verified');;

    // Reservations Route
    Route::view("/reservations","layouts.reservations")->name('reservations');

    // Equipments Route
    Route::view("/equipments","layouts.equipments")->name('equipments');

    // Settings Route
    Route::view("/settings","layouts.settings")->name('settings');
});

//Login form--------------------------------------------------------------------------------------------------
Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

// Register Form-----------------------------------------------------------------------------------------------
Route::get('/register',[AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');


//Email Verification--------------------------------------------------------------------------------------------
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


//Forgot Password Routes------------------------------------------------------------------------------------------
Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password');
Route::post('/forgot-password', [AuthController::class, 'forgotPasswordPost'])->name('forgot-password.post');

// Reset Password Routes------------------------------------------------------------------------------------------
Route::get('password/reset/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [AuthController::class, 'resetPassword'])->name('password.update');

//Terms and Conditions--------------------------------------------------------------------------------------------
Route::get('/terms-and-conditions', function () {
    return view('auth.terms-and-conditions');
})->name('terms-and-conditions');

//Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
