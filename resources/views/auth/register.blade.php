@extends('layouts.auth')

@section('title', 'Portal Kinerja')

@section('content')
  <div class="row g-0 w-100" style="max-width: 1200px;">
    <!-- Left Panel - Welcome -->
    <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center p-5">
      <div class="text-center text-white">
        <div class="logo-main mb-4">
          <i class="fas fa-rocket fa-2x text-white"></i>
        </div>
        <h2 class="display-5 fw-bold mb-4">Registrasi Karyawan Baru</h2>
        <p class="lead mb-4">Daftar untuk akses sistem monitoring kinerja karyawan</p>

        <div class="card border-0" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px);">
          <div class="card-body p-4">
            <h5 class="text-white mb-3"><i class="fas fa-user-plus me-2"></i>Registrasi Sistem!</h5>
            <div class="row text-start">
              <div class="col-12 mb-3">
                <div class="d-flex align-items-center mb-2">
                  <div class="rounded-circle bg-white text-primary d-flex align-items-center justify-content-center me-3"
                    style="width: 40px; height: 40px;">
                    <i class="fas fa-users"></i>
                  </div>
                  <div>
                    <strong class="text-white">Data Karyawan</strong>
                    <p class="small mb-0 text-white-50">Database terpusat informasi karyawan</p>
                  </div>
                </div>
              </div>
              <div class="col-12 mb-3">
                <div class="d-flex align-items-center mb-2">
                  <div class="rounded-circle bg-white text-success d-flex align-items-center justify-content-center me-3"
                    style="width: 40px; height: 40px;">
                    <i class="fas fa-chart-bar"></i>
                  </div>
                  <div>
                    <strong class="text-white">Monitoring Kinerja</strong>
                    <p class="small mb-0 text-white-50">Track produktivitas harian karyawan</p>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="d-flex align-items-center mb-2">
                  <div class="rounded-circle bg-white text-warning d-flex align-items-center justify-content-center me-3"
                    style="width: 40px; height: 40px;">
                    <i class="fas fa-file-alt"></i>
                  </div>
                  <div>
                    <strong class="text-white">Laporan & Dokumen</strong>
                    <p class="small mb-0 text-white-50">Sistem pengelolaan dokumen karyawan</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-4">
          <div class="d-flex align-items-center justify-content-center gap-2 mb-3">
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
          </div>
          <p class="small mb-0">Sistem monitoring kinerja untuk 50+ karyawan</p>
        </div>
      </div>
    </div>

    <!-- Right Panel - Registration Form -->
    <div class="col-lg-6 col-md-8">
      <div class="auth-card p-5" style="margin-top: 40px; margin-bottom: 40px;">
        <!-- Logo for mobile -->
        <div class="d-lg-none text-center mb-4">
          <div class="logo-main mb-3">
            <i class="fas fa-rocket fa-2x text-white"></i>
          </div>
          <h3 class="fw-bold text-white">Kinerja Karyawan</h3>
        </div>

        <div class="text-center mb-5">
          <h2 class="fw-bold mb-2"
            style="background: var(--secondary-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent; text-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            Registrasi Karyawan Baru
          </h2>
          <p class="text-muted">Daftar untuk akses sistem monitoring kinerja</p>
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
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        @endif

        <!-- Registration Form -->
        <form method="POST" action="{{ route('auth.register.submit') }}">
          @csrf

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="first_name" class="form-label fw-semibold">
                <i class="fas fa-user me-2 text-primary"></i>Nama Depan*
              </label>
              <input type="text" class="form-control" id="first_name" name="first_name" placeholder="John" required
                value="{{ old('first_name') }}">
              @if ($errors->has('first_name'))
                <div class="text-danger small mt-1">
                  <i class="fas fa-exclamation-circle"></i> {{ $errors->first('first_name') }}
                </div>
              @endif
            </div>

            <div class="col-md-6 mb-3">
              <label for="last_name" class="form-label fw-semibold">
                <i class="fas fa-user me-2 text-primary"></i>Nama Belakang*
              </label>
              <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Doe" required
                value="{{ old('last_name') }}">
              @if ($errors->has('last_name'))
                <div class="text-danger small mt-1">
                  <i class="fas fa-exclamation-circle"></i> {{ $errors->first('last_name') }}
                </div>
              @endif
            </div>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label fw-semibold">
              <i class="fas fa-envelope me-2 text-primary"></i>Email*
            </label>
            <input type="email" class="form-control" id="email" name="email" placeholder="nama@novacorp.com"
              required autocomplete="email" value="{{ old('email') }}">
            @if ($errors->has('email'))
              <div class="text-danger small mt-1">
                <i class="fas fa-exclamation-circle"></i> {{ $errors->first('email') }}
              </div>
            @endif
          </div>

          <div class="mb-3">
            <label for="phone" class="form-label fw-semibold">
              <i class="fas fa-phone me-2 text-primary"></i>Nomor Telepon*
            </label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="0812-3456-7890"
              required value="{{ old('phone') }}">
            @if ($errors->has('phone'))
              <div class="text-danger small mt-1">
                <i class="fas fa-exclamation-circle"></i> {{ $errors->first('phone') }}
              </div>
            @endif
          </div>

          <div class="mb-3">
            <label for="company" class="form-label fw-semibold">
              <i class="fas fa-building me-2 text-primary"></i>Departemen
            </label>
            <select class="form-select" id="company" name="company" required>
              <option value="">Pilih Departemen</option>
              <option value="pemasaran">Pemasaran</option>
              <option value="penjualan">Penjualan</option>
              <option value="sdm">Sumber Daya Manusia (SDM)</option>
              <option value="keuangan">Keuangan</option>
              <option value="ti">Teknologi Informasi (TI)</option>
              <option value="produksi">Produksi/Operasi</option>
              <option value="rnd">Riset dan Pengembangan (R&D)</option>
            </select>
            @if ($errors->has('company'))
              <div class="text-danger small mt-1">
                <i class="fas fa-exclamation-circle"></i> {{ $errors->first('company') }}
              </div>
            @endif
          </div>

          <div class="mb-3">
            <label for="password" class="form-label fw-semibold">
              <i class="fas fa-lock me-2 text-primary"></i>Password*
            </label>
            <div class="password-input-container">
              <input type="password" class="form-control password-input" id="password" name="password"
                placeholder="Min. 8 karakter" required autocomplete="new-password">
              <button class="password-toggle" type="button" id="togglePassword">
                <i class="fas fa-eye" id="eyeIcon"></i>
              </button>
            </div>
            <div class="mt-2">
              <div class="progress" style="height: 4px;">
                <div class="progress-bar" id="passwordStrength" role="progressbar" style="width: 0%"></div>
              </div>
              <small class="text-muted" id="passwordHint">Gunakan kombinasi huruf, angka, dan simbol</small>
            </div>
            @if ($errors->has('password'))
              <div class="text-danger small mt-1">
                <i class="fas fa-exclamation-circle"></i> {{ $errors->first('password') }}
              </div>
            @endif
          </div>

          <div class="mb-3">
            <label for="password_confirmation" class="form-label fw-semibold">
              <i class="fas fa-lock me-2 text-primary"></i>Konfirmasi Password
            </label>
            <div class="password-input-container">
              <input type="password" class="form-control password-input" id="password_confirmation"
                name="password_confirmation" placeholder="Ulangi password" required autocomplete="new-password">
              <button class="password-toggle" type="button" id="togglePasswordConfirm">
                <i class="fas fa-eye" id="eyeIconConfirm"></i>
              </button>
            </div>
            @if ($errors->has('password_confirmation'))
              <div class="text-danger small mt-1">
                <i class="fas fa-exclamation-circle"></i> {{ $errors->first('password_confirmation') }}
              </div>
            @endif
          </div>

          <div class="mb-4">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
              <label class="form-check-label" for="terms">
                Saya menyetujui <a href="#" class="text-decoration-none">Syarat & Ketentuan</a>
                dan <a href="#" class="text-decoration-none">Kebijakan Privasi</a>
              </label>
            </div>
            @if ($errors->has('terms'))
              <div class="text-danger small mt-1">
                <i class="fas fa-exclamation-circle"></i> {{ $errors->first('terms') }}
              </div>
            @endif
          </div>

          <div class="d-grid mb-4">
            <button type="submit" class="btn btn-primary-gradient btn-lg">
              <i class="fas fa-user-plus me-2"></i>
              Daftar Sekarang
            </button>
          </div>
        </form>

        <div class="decorative-line"></div>

        <!-- Already have account -->
        <div class="text-center">
          <p class="mb-0">
            Sudah punya akun?
            <a href="{{ route('auth.login') }}" class="text-decoration-none fw-semibold">
              Masuk di sini
              <i class="fas fa-arrow-right ms-1"></i>
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
    // Toggle password visibility
    document.getElementById('togglePassword').addEventListener('click', function() {
      const passwordInput = document.getElementById('password');
      const eyeIcon = document.getElementById('eyeIcon');

      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
      } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
      }
    });

    // Toggle confirm password visibility
    document.getElementById('togglePasswordConfirm').addEventListener('click', function() {
      const passwordConfirmInput = document.getElementById('password_confirmation');
      const eyeIconConfirm = document.getElementById('eyeIconConfirm');

      if (passwordConfirmInput.type === 'password') {
        passwordConfirmInput.type = 'text';
        eyeIconConfirm.classList.remove('fa-eye');
        eyeIconConfirm.classList.add('fa-eye-slash');
      } else {
        passwordConfirmInput.type = 'password';
        eyeIconConfirm.classList.remove('fa-eye-slash');
        eyeIconConfirm.classList.add('fa-eye');
      }
    });

    // Password strength checker
    const passwordInput = document.getElementById('password');
    const passwordStrength = document.getElementById('passwordStrength');
    const passwordHint = document.getElementById('passwordHint');

    passwordInput.addEventListener('input', function() {
      const password = this.value;
      let strength = 0;
      let feedback = '';

      if (password.length >= 8) strength += 25;
      if (password.match(/[a-z]/)) strength += 25;
      if (password.match(/[A-Z]/)) strength += 25;
      if (password.match(/[0-9]/)) strength += 12.5;
      if (password.match(/[^a-zA-Z0-9]/)) strength += 12.5;

      passwordStrength.style.width = strength + '%';

      if (strength < 25) {
        passwordStrength.className = 'progress-bar bg-danger';
        feedback = 'Password sangat lemah';
      } else if (strength < 50) {
        passwordStrength.className = 'progress-bar bg-warning';
        feedback = 'Password lemah';
      } else if (strength < 75) {
        passwordStrength.className = 'progress-bar bg-info';
        feedback = 'Password cukup kuat';
      } else {
        passwordStrength.className = 'progress-bar bg-success';
        feedback = 'Password sangat kuat';
      }

      passwordHint.textContent = feedback;
    });


    // Form validation on submit
    document.querySelector('form').addEventListener('submit', function(e) {
      const password = passwordInput.value;
      const passwordConfirm = passwordConfirmInput.value;

      if (password !== passwordConfirm) {
        e.preventDefault();
        alert('Password dan konfirmasi password tidak cocok!');
        return false;
      }

      if (password.length < 8) {
        e.preventDefault();
        alert('Password harus minimal 8 karakter!');
        return false;
      }
    });

    // Add animation to form inputs
    const inputs = document.querySelectorAll('.form-control');
    inputs.forEach(input => {
      input.addEventListener('focus', function() {
        this.parentElement.style.transform = 'scale(1.02)';
      });

      input.addEventListener('blur', function() {
        this.parentElement.style.transform = 'scale(1)';
      });
    });
  </script>
@endsection
