<?php

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
  return redirect()->route('login');
});

Route::middleware(['guest'])->get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// !Authentication Routes
Route::prefix('auth')->name('auth.')->group(function () {
  // ! Login Routes
  Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
  Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

  // ! Registration Routes
  Route::get('/register/{step?}', [RegisterController::class, 'showRegistrationForm'])->name('register');
  Route::post('/register/step1', [RegisterController::class, 'registerStep1'])->name('register.step1');
  Route::post('/register/step2', [RegisterController::class, 'registerStep2'])->name('register.step2');
  Route::post('/register/step3', [RegisterController::class, 'registerStep3'])->name('register.step3');
});

Route::middleware(['auth'])->group(function () {
  Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
  
  Route::get('/has-password', function (Request $request) {
    if (config('app.env') === 'production') {
      return response()->json(['error' => 'This route is only available in non-production environments'], 403);
    }

    $password = $request->get('password');
    if ($password === null) {
      return response()->json(['error' => 'Password parameter is missing'], 400);
    }

    return password_hash($password, PASSWORD_DEFAULT);
  });
});

