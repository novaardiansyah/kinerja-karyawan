@extends('layouts.auth')

@section('title', 'Portal Kinerja')

@section('content')
  <div class="row g-0 w-100" style="max-width: 1200px;">
    <!-- Left Panel - Features -->
    <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center p-5">
      <div class="text-center text-white">
        <div class="logo-main mb-4">
          <i class="fas fa-chart-line fa-2x text-white"></i>
        </div>
        <h2 class="display-5 fw-bold mb-4">Portal Kinerja Karyawan</h2>
        <p class="lead mb-5">Akses sistem monitoring kinerja perusahaan</p>

        <div class="card border-0 mt-4 login-features-card" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px);">
          <div class="card-body p-4">
            <h5 class="text-white mb-4"><i class="fas fa-sign-in-alt me-2"></i>Login ke Sistem</h5>
            <div class="row text-start">
              <div class="col-12 mb-3">
                <div class="d-flex align-items-center mb-2">
                  <div class="rounded-circle bg-white text-primary d-flex align-items-center justify-content-center me-3"
                    style="width: 40px; height: 40px;">
                    <i class="fas fa-fingerprint"></i>
                  </div>
                  <div>
                    <strong class="text-white">Absensi Digital</strong>
                    <p class="small mb-0 text-white-50">Monitoring kehadiran real-time</p>
                  </div>
                </div>
              </div>
              <div class="col-12 mb-3">
                <div class="d-flex align-items-center mb-2">
                  <div class="rounded-circle bg-white text-success d-flex align-items-center justify-content-center me-3"
                    style="width: 40px; height: 40px;">
                    <i class="fas fa-chart-line"></i>
                  </div>
                  <div>
                    <strong class="text-white">Laporan Kinerja</strong>
                    <p class="small mb-0 text-white-50">Analisis produktivitas harian</p>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="d-flex align-items-center mb-2">
                  <div class="rounded-circle bg-white text-warning d-flex align-items-center justify-content-center me-3"
                    style="width: 40px; height: 40px;">
                    <i class="fas fa-tasks"></i>
                  </div>
                  <div>
                    <strong class="text-white">Manajemen Tugas</strong>
                    <p class="small mb-0 text-white-50">Tracking progress tugas karyawan</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Right Panel - Login Form -->
    <div class="col-lg-6 col-md-12">
      <div class="auth-card p-3 p-lg-5" style="margin: 60px 15px 15px 15px;">
        <!-- Mobile Header -->
        <div class="d-lg-none text-center mb-4">
          <div class="logo-main mb-3" style="width: 50px; height: 50px; margin: 0 auto;">
            <i class="fas fa-chart-line fa-1x text-white" style="font-size: 1.2rem;"></i>
          </div>
          <h3 class="fw-bold text-primary mb-2">Portal Kinerja</h3>
          <p class="text-muted small">Selamat datang kembali!<br> Masuk ke sistem kinerja karyawan</p>
        </div>

        <!-- Desktop Header -->
        <div class="d-none d-lg-block text-center mb-5">
          <h2 class="fw-bold mb-2 text-primary">Portal Kinerja</h2>
          <p class="text-muted">Selamat datang kembali!<br> Masuk ke sistem kinerja karyawan</p>
        </div>

        <!-- Flash Messages -->
        @if (session('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        @endif

        @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('auth.login.submit') }}">
          @csrf

          <div class="mb-3">
            <label for="email" class="form-label fw-semibold">
              <i class="fas fa-envelope me-2 text-primary"></i>Email Address
            </label>
            <input type="email" class="form-control" id="email" name="email" placeholder="nama@email.com"
              autocomplete="email" value="{{ old('email') }}">
            @if ($errors->has('email'))
              <div class="text-danger small mt-1">
                <i class="fas fa-exclamation-circle"></i> {{ $errors->first('email') }}
              </div>
            @endif
          </div>

          <div class="mb-3">
            <label for="password" class="form-label fw-semibold">
              <i class="fas fa-lock me-2 text-primary"></i>Password
            </label>
            <div class="password-input-container">
              <input type="password" class="form-control password-input" id="password" name="password" placeholder="Masukkan password"
                autocomplete="current-password">
              <button class="password-toggle" type="button" id="togglePassword">
                <i class="fas fa-eye" id="eyeIcon"></i>
              </button>
            </div>
            @if ($errors->has('password'))
              <div class="text-danger small mt-1">
                <i class="fas fa-exclamation-circle"></i> {{ $errors->first('password') }}
              </div>
            @endif
          </div>

          <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="remember" name="remember">
              <label class="form-check-label" for="remember">
                Ingat saya
              </label>
            </div>
            <a href="#" class="text-decoration-none">
              <small class="text-primary">Lupa password?</small>
            </a>
          </div>

          <div class="d-grid mb-4">
            <button type="submit" class="btn btn-primary-gradient">
              <i class="fas fa-sign-in-alt me-2"></i>
              Masuk
            </button>
          </div>
        </form>

        <div class="decorative-line"></div>

        <!-- Social Login - Desktop Only -->
        <div class="d-none d-lg-block text-center mb-4">
          <p class="text-muted mb-3">Atau masuk dengan:</p>
          <div class="d-flex justify-content-center gap-3">
            <button class="btn social-btn" style="background: #1877f2;">
              <i class="fab fa-facebook-f"></i>
            </button>
            <button class="btn social-btn" style="background: #ea4335;">
              <i class="fab fa-google"></i>
            </button>
            <button class="btn social-btn" style="background: #0077b5;">
              <i class="fab fa-linkedin-in"></i>
            </button>
            <button class="btn social-btn" style="background: #000000;">
              <i class="fab fa-microsoft"></i>
            </button>
          </div>
        </div>

        <div class="text-center">
          <p class="mb-0 d-lg-block">
            <span class="d-lg-inline">Belum punya akun?</span>
            <a href="{{ route('auth.register') }}" class="text-decoration-none fw-semibold d-lg-inline">
              <span class="d-lg-none"><br></span>
              Daftar sekarang
              <i class="fas fa-arrow-right ms-1"></i>
            </a>
          </p>
        </div>

        </div>
    </div>
  </div>
@endsection

@section('styles')
  <style>
    /* Add padding for better scroll experience */
    body {
      padding-bottom: 30px;
    }

    @media (max-width: 768px) {
      body {
        padding-bottom: 20px;
      }
    }
    @media (max-width: 768px) {
      .auth-card {
        margin: 15px 8px 15px 8px !important;
        padding: 25px !important;
        border-radius: 15px !important;
      }

      .btn-primary-gradient {
        padding: 12px 24px !important;
        font-size: 1rem !important;
        border-radius: 12px !important;
      }

      .form-control, .form-select {
        padding: 12px 16px !important;
        font-size: 0.9rem !important;
        border-radius: 12px !important;
      }

      .form-label {
        font-size: 0.85rem !important;
        margin-bottom: 0.5rem !important;
      }

      .logo-main {
        width: 50px !important;
        height: 50px !important;
      }

      h3 {
        font-size: 1.3rem !important;
      }

      .text-muted.small {
        font-size: 0.8rem !important;
      }
    }

    @media (max-width: 576px) {
      .auth-card {
        margin: 20px 5px 15px 5px !important;
        padding: 20px !important;
        border-radius: 12px !important;
      }

      .btn-primary-gradient {
        padding: 10px 20px !important;
        font-size: 0.9rem !important;
      }

      .form-control, .form-select {
        padding: 10px 14px !important;
        font-size: 0.85rem !important;
      }

      .logo-main {
        width: 45px !important;
        height: 45px !important;
      }

      h3 {
        font-size: 1.2rem !important;
      }

      .btn-primary-gradient:active {
        transform: scale(0.98) !important;
        opacity: 0.85 !important;
        transition: all 0.1s ease !important;
      }

      .btn-primary-gradient:hover {
        color: white !important;
        opacity: 0.9 !important;
        transition: all 0.3s ease !important;
      }
    }

    /* Login Features Card Styles */
    .login-features-card {
      transition: all 0.3s ease;
    }

    .login-features-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }
  </style>
@endsection

