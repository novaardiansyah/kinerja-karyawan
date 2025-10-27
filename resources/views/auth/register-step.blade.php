@extends('layouts.auth')

@section('title', 'Portal Kinerja - Registrasi Step ' . $step)

@section('content')
  <div class="row g-0 w-100" style="max-width: 1200px;">
    <!-- Left Panel - Welcome -->
    <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center p-5">
      <div class="text-center text-white">
        <div class="logo-main mb-4">
          <i class="fas fa-rocket fa-2x text-white"></i>
        </div>
        <h2 class="display-5 fw-bold mb-4">Registrasi Karyawan Baru</h2>
        <p class="lead mb-5">Daftar untuk akses sistem monitoring kinerja karyawan</p>

        <!-- Progress Steps -->
        <div class="mb-5">
          <div class="d-flex justify-content-center align-items-center" style="gap: 30px;">
            <div class="step-indicator {{ $step >= 1 ? 'active' : '' }}" data-step="1">
              <div class="step-circle">1</div>
              <span class="step-label">Data Pribadi</span>
            </div>
            <div class="step-line {{ $step >= 2 ? 'completed' : '' }}"></div>
            <div class="step-indicator {{ $step >= 2 ? 'active' : '' }}" data-step="2">
              <div class="step-circle">2</div>
              <span class="step-label">Data Perusahaan</span>
            </div>
            <div class="step-line {{ $step >= 3 ? 'completed' : '' }}"></div>
            <div class="step-indicator {{ $step >= 3 ? 'active' : '' }}" data-step="3">
              <div class="step-circle">3</div>
              <span class="step-label">Keamanan</span>
            </div>
          </div>
        </div>

        <div class="card border-0 mt-4" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px);">
          <div class="card-body p-4">
            <h5 class="text-white mb-4"><i class="fas fa-user-plus me-2"></i>Registrasi Sistem!</h5>
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
      </div>
    </div>

    <!-- Right Panel - Registration Form -->
    <div class="col-lg-6 col-md-12">
      <div class="auth-card p-3 p-lg-5" style="margin: 60px 15px 15px 15px;">
        <!-- Mobile Header -->
        <div class="d-lg-none text-center mb-4">
          <div class="logo-main mb-3" style="width: 50px; height: 50px; margin: 0 auto;">
            <i class="fas fa-rocket fa-1x text-white" style="font-size: 1.2rem;"></i>
          </div>
          <h3 class="fw-bold text-primary mb-2">Registrasi Karyawan</h3>
          <p class="text-muted small mb-3">
            @switch($step)
              @case(1)
                Langkah 1: Data Pribadi
              @break

              @case(2)
                Langkah 2: Perusahaan
              @break

              @case(3)
                Langkah 3: Keamanan
              @break
            @endswitch
          </p>

          <!-- Mobile Progress Steps -->
          <div class="mb-3">
            <div class="d-flex justify-content-center align-items-center" style="gap: 15px;">
              <div class="step-indicator {{ $step >= 1 ? 'active' : '' }}" data-step="1">
                <div class="step-circle">1</div>
                <span class="step-label">Data</span>
              </div>
              <div class="step-line {{ $step >= 2 ? 'completed' : '' }}"></div>
              <div class="step-indicator {{ $step >= 2 ? 'active' : '' }}" data-step="2">
                <div class="step-circle">2</div>
                <span class="step-label">Perusahaan</span>
              </div>
              <div class="step-line {{ $step >= 3 ? 'completed' : '' }}"></div>
              <div class="step-indicator {{ $step >= 3 ? 'active' : '' }}" data-step="3">
                <div class="step-circle">3</div>
                <span class="step-label">Keamanan</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Desktop Header -->
        <div class="d-none d-lg-block text-center mb-5">
          <h2 class="fw-bold mb-2 text-primary">Registrasi Karyawan Baru</h2>
          <p class="text-muted">
            @switch($step)
              @case(1)
                Langkah 1 dari 3: Informasi Pribadi
              @break

              @case(2)
                Langkah 2 dari 3: Informasi Perusahaan
              @break

              @case(3)
                Langkah 3 dari 3: Keamanan Akun
              @break
            @endswitch
          </p>
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

        <!-- Step 1: Personal Information -->
        @if ($step == 1)
          <form method="POST" action="{{ route('auth.register.step1') }}">
            @csrf

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="first_name" class="form-label fw-semibold">
                  <i class="fas fa-user me-2 text-primary"></i>Nama Depan*
                </label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="John"
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
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Doe"
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
              <input type="email" class="form-control" id="email" name="email"
                placeholder="nama@novadev.my.id" autocomplete="email" value="{{ old('email') }}">
              @if ($errors->has('email'))
                <div class="text-danger small mt-1">
                  <i class="fas fa-exclamation-circle"></i> {{ $errors->first('email') }}
                </div>
              @endif
            </div>

            <div class="mb-4">
              <label for="phone" class="form-label fw-semibold">
                <i class="fas fa-phone me-2 text-primary"></i>Nomor Telepon*
              </label>
              <input type="tel" class="form-control" id="phone" name="phone" placeholder="0812-3456-7890"
                value="{{ old('phone') }}">
              @if ($errors->has('phone'))
                <div class="text-danger small mt-1">
                  <i class="fas fa-exclamation-circle"></i> {{ $errors->first('phone') }}
                </div>
              @endif
            </div>

            <div class="d-grid mb-4">
              <button type="submit" class="btn btn-primary-gradient">
                Lanjut
                <i class="fas fa-arrow-right ms-2"></i>
              </button>
            </div>
          </form>
        @endif

        <!-- Step 2: Company Information -->
        @if ($step == 2)
          <form method="POST" action="{{ route('auth.register.step2') }}">
            @csrf

            <div class="mb-3">
              <label for="department_id" class="form-label fw-semibold">
                <i class="fas fa-building me-2 text-primary"></i>Departemen*
              </label>
              <select class="form-select" id="department_id" name="department_id">
                <option value="">Pilih Departemen</option>
                @foreach ($departments as $department)
                  <option value="{{ $department->id }}"
                    {{ old('department_id') == $department->id ? 'selected' : '' }}>
                    {{ $department->name }}
                  </option>
                @endforeach
              </select>
              @if ($errors->has('department_id'))
                <div class="text-danger small mt-1">
                  <i class="fas fa-exclamation-circle"></i> {{ $errors->first('department_id') }}
                </div>
              @endif
            </div>

            <div class="mb-3">
              <label for="position_id" class="form-label fw-semibold">
                <i class="fas fa-briefcase me-2 text-primary"></i>Posisi/Jabatan*
              </label>
              <select class="form-select" id="position_id" name="position_id" disabled>
                <option value="">Pilih departemen terlebih dahulu</option>
              </select>
              @if ($errors->has('position_id'))
                <div class="text-danger small mt-1">
                  <i class="fas fa-exclamation-circle"></i> {{ $errors->first('position_id') }}
                </div>
              @endif
            </div>

            <div class="mb-4">
              <label for="join_date" class="form-label fw-semibold">
                <i class="fas fa-calendar me-2 text-primary"></i>Tanggal Bergabung*
              </label>
              <input type="date" class="form-control" id="join_date" name="join_date"
                value="{{ old('join_date') ?? date('Y-m-d') }}">
              @if ($errors->has('join_date'))
                <div class="text-danger small mt-1">
                  <i class="fas fa-exclamation-circle"></i> {{ $errors->first('join_date') }}
                </div>
              @endif
            </div>

            <div class="row">
              <div class="col-6">
                <button type="button" class="btn btn-outline-primary w-100" onclick="history.back()">
                  <i class="fas fa-arrow-left me-2"></i>
                  Kembali
                </button>
              </div>
              <div class="col-6">
                <button type="submit" class="btn btn-primary-gradient w-100">
                  Lanjut
                  <i class="fas fa-arrow-right ms-2"></i>
                </button>
              </div>
            </div>
          </form>
        @endif

        <!-- Step 3: Security & Terms -->
        @if ($step == 3)
          <form method="POST" action="{{ route('auth.register.step3') }}">
            @csrf

            <div class="mb-3">
              <label for="password" class="form-label fw-semibold">
                <i class="fas fa-lock me-2 text-primary"></i>Password*
              </label>
              <div class="password-input-container">
                <input type="password" class="form-control password-input" id="password" name="password"
                  placeholder="Min. 8 karakter" autocomplete="new-password">
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
                  name="password_confirmation" placeholder="Ulangi password" autocomplete="new-password">
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
                <input class="form-check-input" type="checkbox" id="terms" name="terms">
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

            <div class="row">
              <div class="col-6">
                <button type="button" class="btn btn-outline-primary w-100" onclick="history.back()">
                  <i class="fas fa-arrow-left me-2"></i>
                  Kembali
                </button>
              </div>
              <div class="col-6">
                <button type="submit" class="btn btn-primary-gradient w-100">
                  <i class="fas fa-check me-2"></i>
                  Daftar Sekarang
                </button>
              </div>
            </div>
          </form>
        @endif

        <div class="decorative-line"></div>

        <!-- Already have account -->
        <div class="text-center">
          <p class="mb-0 d-lg-block">
            <span class="d-lg-inline">Sudah punya akun?</span>
            <a href="{{ route('login') }}" class="text-decoration-none fw-semibold d-lg-inline">
              <span class="d-lg-none"><br></span>
              Masuk di sini
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

    .step-indicator {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 10px;
      opacity: 0.6;
      transition: all 0.3s ease;
      min-width: 80px;
    }

    .step-indicator.active {
      opacity: 1;
    }

    .step-circle {
      width: 45px;
      height: 45px;
      border-radius: 50%;
      background: rgba(0, 0, 0, 0.2);
      color: rgba(255, 255, 255, 0.8);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      font-size: 16px;
      border: 2px solid rgba(255, 255, 255, 0.4);
      transition: all 0.3s ease;
    }

    .step-indicator.active .step-circle {
      background: white;
      color: #0d6efd;
      border-color: white;
      box-shadow: 0 0 15px rgba(255, 255, 255, 0.8);
      transform: scale(1.1);
    }

    .step-label {
      font-size: 12px;
      color: rgba(255, 255, 255, 0.6);
      text-align: center;
      white-space: nowrap;
      font-weight: 500;
      transition: all 0.3s ease;
      margin-top: 5px;
    }

    .step-indicator.active .step-label {
      color: white;
      font-weight: 600;
    }

    .step-line {
      width: 40px;
      height: 2px;
      background: rgba(255, 255, 255, 0.2);
      transition: all 0.3s ease;
      align-self: center;
      margin-top: 20px;
    }

    .step-line.completed {
      background: rgba(255, 255, 255, 0.9);
    }

    @media (max-width: 768px) {
      .step-circle {
        width: 36px;
        height: 36px;
        font-size: 14px;
        background: rgba(0, 0, 0, 0.1) !important;
        border: 2px solid rgba(13, 110, 253, 0.4) !important;
        color: rgba(0, 0, 0, 0.6) !important;
      }

      .step-indicator.active .step-circle {
        background: #0d6efd !important;
        color: white !important;
        border: 2px solid #0d6efd !important;
      }

      .step-line {
        width: 28px;
        height: 3px !important;
        background: rgba(13, 110, 253, 0.2) !important;
      }

      .step-line.completed {
        background: #0d6efd !important;
      }

      .step-label {
        font-size: 10px;
        font-weight: 600 !important;
        color: rgba(0, 0, 0, 0.6) !important;
      }

      .step-indicator.active .step-label {
        color: rgba(0, 0, 0, 0.9) !important;
      }

      .auth-card {
        margin: 15px 8px 15px 8px !important;
        padding: 25px !important;
        border-radius: 15px !important;
      }

      .btn-primary-gradient,
      .btn-outline-primary {
        padding: 12px 24px !important;
        font-size: 1rem !important;
        border-radius: 12px !important;
      }

      .form-control,
      .form-select {
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
      .step-circle {
        width: 32px;
        height: 32px;
        font-size: 12px;
        background: rgba(0, 0, 0, 0.1) !important;
        border: 2px solid rgba(13, 110, 253, 0.4) !important;
        color: rgba(0, 0, 0, 0.6) !important;
      }

      .step-indicator.active .step-circle {
        background: #0d6efd !important;
        color: white !important;
        border: 2px solid #0d6efd !important;
      }

      .step-line {
        width: 24px;
        height: 3px !important;
        background: rgba(13, 110, 253, 0.2) !important;
      }

      .step-line.completed {
        background: #0d6efd !important;
      }

      .step-label {
        font-size: 9px;
        font-weight: 600 !important;
        color: rgba(0, 0, 0, 0.6) !important;
      }

      .step-indicator.active .step-label {
        color: rgba(0, 0, 0, 0.9) !important;
      }

      .auth-card {
        margin: 20px 5px 15px 5px !important;
        padding: 20px !important;
        border-radius: 12px !important;
      }

      .btn-primary-gradient,
      .btn-outline-primary {
        padding: 10px 20px !important;
        font-size: 0.9rem !important;
      }

      .form-control,
      .form-select {
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

      .text-center p span {
        display: inline;
      }

      .text-center p a {
        margin-left: 5px;
      }

      .btn-primary-gradient:active {
        transform: scale(0.98) !important;
        opacity: 0.85 !important;
        transition: all 0.1s ease !important;
      }

      .btn-outline-primary:active {
        transform: scale(0.98) !important;
        opacity: 0.85 !important;
        transition: all 0.1s ease !important;
      }

      .btn-primary-gradient:hover,
      .btn-outline-primary:hover {
        opacity: 0.9 !important;
        transition: all 0.3s ease !important;
      }
    }
  </style>
@endsection

@section('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const departmentSelect = document.getElementById('department_id');
      const positionSelect = document.getElementById('position_id');

      if (departmentSelect && positionSelect) {
        departmentSelect.addEventListener('change', function() {
          const departmentId = this.value;

          // Reset position select
          positionSelect.innerHTML = '<option value="">Memuat...</option>';
          positionSelect.disabled = true;

          if (departmentId) {
            // Fetch positions via API
            fetch(`/api/positions/by-department?department_id=${departmentId}`)
              .then(response => response.json())
              .then(data => {
                positionSelect.innerHTML = '<option value="">Pilih Posisi</option>';

                if (data.success && data.data.length > 0) {
                  data.data.forEach(position => {
                    const option = document.createElement('option');
                    option.value = position.id;
                    option.textContent = `${position.name} (${position.level})`;
                    positionSelect.appendChild(option);
                  });
                  positionSelect.disabled = false;
                } else {
                  positionSelect.innerHTML = '<option value="">Tidak ada posisi tersedia</option>';
                  positionSelect.disabled = true;
                }
              })
              .catch(error => {
                console.error('Error fetching positions:', error);
                positionSelect.innerHTML = '<option value="">Terjadi kesalahan</option>';
                positionSelect.disabled = true;
              });
          } else {
            positionSelect.innerHTML = '<option value="">Pilih departemen terlebih dahulu</option>';
            positionSelect.disabled = true;
          }
        });

        // Handle form submission validation
        const form = document.querySelector('form[action*="register.step2"]');
        if (form) {
          form.addEventListener('submit', function(e) {
            if (!departmentSelect.value) {
              e.preventDefault();
              alert('Silakan pilih departemen terlebih dahulu');
              departmentSelect.focus();
              return;
            }

            if (!positionSelect.value || positionSelect.disabled) {
              e.preventDefault();
              alert('Silakan pilih posisi/jabatan');
              positionSelect.focus();
              return;
            }
          });
        }
      }
    });

    const passwordInput = document.getElementById('password');
    if (passwordInput) {
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

        let percent = 0;

        if (strength < 25) {
          percent = 25;
          passwordStrength.className = 'progress-bar bg-danger';
          feedback = 'Password sangat lemah';
        } else if (strength < 50) {
          percent = 50;
          passwordStrength.className = 'progress-bar bg-warning';
          feedback = 'Password lemah';
        } else if (strength < 75) {
          percent = 75;
          passwordStrength.className = 'progress-bar bg-success';
          feedback = 'Password cukup kuat';
        } else {
          percent = 100;
          passwordStrength.className = 'progress-bar bg-info';
          feedback = 'Password sangat kuat';
        }

        passwordStrength.style.width = percent + '%';
        passwordHint.textContent = feedback;
      });
    }
  </script>
@endsection
