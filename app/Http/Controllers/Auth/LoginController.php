<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
  /**
   * Show the application's login form.
   *
   * @return \Illuminate\View\View
   */
  public function showLoginForm()
  {
    return view('auth.login');
  }

  /**
   * Handle a login request to the application.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
   *
   * @throws \Illuminate\Validation\ValidationException
   */
  public function login(Request $request)
  {
    $this->validateLogin($request);

    if ($this->hasTooManyLoginAttempts($request)) {
      $this->fireLockoutEvent($request);

      return $this->sendLockoutResponse($request);
    }

    if ($this->attemptLogin($request)) {
      return $this->sendLoginResponse($request);
    }

    $this->incrementLoginAttempts($request);

    return $this->sendFailedLoginResponse($request);
  }

  /**
   * Determine if the user has too many failed login attempts.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return bool
   */
  protected function hasTooManyLoginAttempts(Request $request)
  {
    return RateLimiter::tooManyAttempts($this->throttleKey($request), 5);
  }

  /**
   * Increment the login attempts for the user.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return void
   */
  protected function incrementLoginAttempts(Request $request)
  {
    RateLimiter::hit($this->throttleKey($request));
  }

  
  /**
   * Fire the lockout event.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return void
   */
  protected function fireLockoutEvent(Request $request)
  {
  }

  /**
   * Redirect the user after determining they are locked out.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
   *
   * @throws \Illuminate\Validation\ValidationException
   */
  protected function sendLockoutResponse(Request $request)
  {
    $seconds = RateLimiter::availableIn($this->throttleKey($request));

    throw ValidationException::withMessages([
      $this->username() => [trans('auth.throttle', [
        'seconds' => $seconds,
        'minutes' => ceil($seconds / 60),
      ])],
    ]);
  }

  /**
   * Clear the login locks for the given user credentials.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return void
   */
  protected function clearLoginAttempts(Request $request)
  {
    RateLimiter::clear($this->throttleKey($request));
  }

  /**
   * Get the throttle key for the given request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return string
   */
  protected function throttleKey(Request $request)
  {
    return Str::transliterate(Str::lower($request->input($this->username())).'|'.$request->ip());
  }

  /**
   * Where to redirect users after login.
   *
   * @var string
   */
  protected $redirectTo = '/dashboard';

  /**
   * Get the login username to be used by the controller.
   *
   * @return string
   */
  public function username()
  {
    return 'email';
  }

  /**
   * Validate the user login request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return void
   *
   * @throws \Illuminate\Validation\ValidationException
   */
  protected function validateLogin(Request $request)
  {
    $request->validate([
      $this->username() => 'required|string',
      'password' => 'required|string',
    ], [
      'email.required' => 'Email harus diisi',
      'email.string' => 'Email harus berupa string',
      'password.required' => 'Password harus diisi',
      'password.string' => 'Password harus berupa string',
    ]);
  }

  /**
   * Attempt to log the user into the application.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return bool
   */
  protected function attemptLogin(Request $request)
  {
    return $this->guard()->attempt(
      $this->credentials($request),
      $request->filled('remember')
    );
  }

  /**
   * Get the needed authorization credentials from the request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  protected function credentials(Request $request)
  {
    return $request->only($this->username(), 'password');
  }

  /**
   * Send the response after the user was authenticated.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
   */
  protected function sendLoginResponse(Request $request)
  {
    $request->session()->regenerate();

    $this->clearLoginAttempts($request);

    return redirect()->intended(route('dashboard'))
      ->with('success', 'Selamat datang kembali! Anda telah berhasil login.');
  }

  /**
   * Get the failed login response instance.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Symfony\Component\HttpFoundation\Response
   *
   * @throws \Illuminate\Validation\ValidationException
   */
  protected function sendFailedLoginResponse(Request $request)
  {
    throw ValidationException::withMessages([
      $this->username() => [trans('auth.failed')],
    ]);
  }

  /**
   * Log the user out of the application.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
   */
  public function logout(Request $request)
  {
    $this->guard()->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('auth.login')
      ->with('success', 'Anda telah berhasil logout. Sampai jumpa kembali!');
  }

  /**
   * Get the guard to be used during authentication.
   *
   * @return \Illuminate\Contracts\Auth\StatefulGuard
   */
  protected function guard()
  {
    return Auth::guard();
  }
}