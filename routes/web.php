<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Redirect root to login
Route::get('/', function () {
    return redirect()->route('auth.login');
});

// Authentication Routes
Route::prefix('auth')->name('auth.')->group(function () {
    // Login Routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Registration Routes
    Route::get('/register/{step?}', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register/step1', [RegisterController::class, 'registerStep1'])->name('register.step1');
    Route::post('/register/step2', [RegisterController::class, 'registerStep2'])->name('register.step2');
    Route::post('/register/step3', [RegisterController::class, 'registerStep3'])->name('register.step3');
});

// Protected Routes (require authentication)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
