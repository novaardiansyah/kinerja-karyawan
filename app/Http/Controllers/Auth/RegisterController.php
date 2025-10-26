<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    /**
     * Show the multi-step registration form.
     *
     * @param int $step
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm($step = 1)
    {
        if ($step < 1 || $step > 3) {
            return redirect()->route('auth.register', ['step' => 1]);
        }

        // Get departments for step 2
        $departments = \App\Models\Department::active()->get();

        return view('auth.register-step', compact('step', 'departments'));
    }

    /**
     * Handle step 1 of registration (Personal Information).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function registerStep1(Request $request)
    {
        $validator = $this->step1Validator($request->all());

        if ($validator->fails()) {
            return redirect()->route('auth.register', ['step' => 1])
                ->withErrors($validator)
                ->withInput();
        }

        // Store validated data in session
        Session::put('registration_step1', $validator->validated());

        return redirect()->route('auth.register', ['step' => 2]);
    }

    /**
     * Handle step 2 of registration (Company Information).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function registerStep2(Request $request)
    {
        $validator = $this->step2Validator($request->all());

        if ($validator->fails()) {
            return redirect()->route('auth.register', ['step' => 2])
                ->withErrors($validator)
                ->withInput();
        }

        // Store validated data in session
        Session::put('registration_step2', $validator->validated());

        return redirect()->route('auth.register', ['step' => 3]);
    }

    /**
     * Handle step 3 of registration (Security & Terms).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function registerStep3(Request $request)
    {
        $validator = $this->step3Validator($request->all());

        if ($validator->fails()) {
            return redirect()->route('auth.register', ['step' => 3])
                ->withErrors($validator)
                ->withInput();
        }

        // Merge all registration data
        $userData = array_merge(
            Session::get('registration_step1', []),
            Session::get('registration_step2', []),
            $validator->validated()
        );

        // Create user
        $user = $this->create($userData);

        // Clear registration session data
        Session::forget(['registration_step1', 'registration_step2']);

        // Auto login after registration
        $this->guard()->login($user);

        return redirect()->route('dashboard')
            ->with('success', 'Selamat datang! Akun Anda telah berhasil dibuat.');
    }

    /**
     * Get a validator for step 1 (Personal Information).
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function step1Validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:20'],
        ], [
            'first_name.required' => 'Nama depan harus diisi',
            'first_name.string' => 'Nama depan harus berupa string',
            'first_name.max' => 'Nama depan maksimal 255 karakter',
            'last_name.required' => 'Nama belakang harus diisi',
            'last_name.string' => 'Nama belakang harus berupa string',
            'last_name.max' => 'Nama belakang maksimal 255 karakter',
            'email.required' => 'Email harus diisi',
            'email.string' => 'Email harus berupa string',
            'email.email' => 'Format email tidak valid',
            'email.max' => 'Email maksimal 255 karakter',
            'email.unique' => 'Email sudah terdaftar',
            'phone.required' => 'Nomor telepon harus diisi',
            'phone.string' => 'Nomor telepon harus berupa string',
            'phone.max' => 'Nomor telepon maksimal 20 karakter',
        ]);
    }

    /**
     * Get a validator for step 2 (Company Information).
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function step2Validator(array $data)
    {
        return Validator::make($data, [
            'department_id' => ['required', 'exists:departments,id'],
            'position_id' => ['required', 'exists:positions,id'],
            'join_date' => ['required', 'date', 'before_or_equal:today'],
        ], [
            'department_id.required' => 'Departemen harus dipilih',
            'department_id.exists' => 'Departemen tidak valid',
            'position_id.required' => 'Posisi/jabatan harus dipilih',
            'position_id.exists' => 'Posisi tidak valid',
            'join_date.required' => 'Tanggal bergabung harus diisi',
            'join_date.date' => 'Format tanggal tidak valid',
            'join_date.before_or_equal' => 'Tanggal bergabung tidak boleh lebih dari hari ini',
        ]);
    }

    /**
     * Get a validator for step 3 (Security & Terms).
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function step3Validator(array $data)
    {
        return Validator::make($data, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['accepted'],
        ], [
            'password.required' => 'Password harus diisi',
            'password.string' => 'Password harus berupa string',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'terms.accepted' => 'Anda harus menyetujui syarat & ketentuan',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => trim($data['first_name'] . ' ' . $data['last_name']),
            'email' => $data['email'],
            'phone' => $data['phone'],
            'department_id' => $data['department_id'],
            'position_id' => $data['position_id'],
            'join_date' => $data['join_date'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Get positions by department for AJAX request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPositionsByDepartment(Request $request)
    {
        $departmentId = $request->get('department_id');

        if (!$departmentId) {
            return response()->json([]);
        }

        $positions = \App\Models\Position::active()
            ->byDepartment($departmentId)
            ->get(['id', 'name', 'level']);

        return response()->json($positions);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}