<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kinerja Karyawan') - Sistem Monitoring Kinerja Perusahaan</title>

    <!-- Bootstrap 5.3.8 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Font Awesome untuk Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Google Fonts - Poppins untuk tampilan modern -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            /* Primary Color Scheme - Modern Bright Blue */
            --primary-gradient: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
            --secondary-gradient: linear-gradient(135deg, #63b3ed 0%, #4299e1 100%);
            --success-gradient: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            --warning-gradient: linear-gradient(135deg, #f6ad55 0%, #ed8936 100%);
            --danger-gradient: linear-gradient(135deg, #fc8181 0%, #f56565 100%);
            --info-gradient: linear-gradient(135deg, #63b3ed 0%, #4299e1 100%);

            /* Solid Colors */
            --primary: #4299e1;
            --secondary: #4299e1;
            --accent: #63b3ed;
            --success: #48bb78;
            --warning: #f6ad55;
            --danger: #fc8181;
            --info: #63b3ed;

            /* Glass Morphism */
            --glass-bg: rgba(255, 255, 255, 0.95);
            --glass-border: rgba(255, 255, 255, 0.18);
            --glass-shadow: 0 8px 32px rgba(31, 38, 135, 0.15);

            /* Text Colors */
            --text-primary: #2d3748;
            --text-secondary: #718096;
            --text-muted: #a0aec0;

            /* Background Colors */
            --bg-primary: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
            --bg-light: #f7fafc;
            --bg-white: #ffffff;

            /* Border Colors */
            --border-light: #e2e8f0;
            --border-medium: #cbd5e0;
            --border-dark: #a0aec0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            background: var(--bg-primary);
            position: relative;
            overflow-x: hidden;
            color: var(--text-primary);
        }

        /* Animated Background Elements */
        .bg-animation {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 0;
            overflow: hidden;
        }

        .floating-shape {
            position: absolute;
            opacity: 0.1;
            animation: float 20s infinite ease-in-out;
        }

        .shape-1 {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape-2 {
            width: 120px;
            height: 120px;
            background: white;
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            top: 60%;
            right: 10%;
            animation-delay: 5s;
        }

        .shape-3 {
            width: 100px;
            height: 100px;
            background: white;
            border-radius: 50%;
            bottom: 20%;
            left: 30%;
            animation-delay: 10s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            33% { transform: translateY(-30px) rotate(120deg); }
            66% { transform: translateY(30px) rotate(240deg); }
        }

        /* Glass Morphism Card */
        .auth-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            box-shadow: var(--glass-shadow);
            position: relative;
            z-index: 1;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .auth-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(31, 38, 135, 0.25);
        }

        .auth-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .auth-card:hover::before {
            left: 100%;
        }

        /* Logo Animation */
        .logo-container {
            position: relative;
            margin-bottom: 2rem;
        }

        .logo-main {
            width: 80px;
            height: 80px;
            background: var(--secondary-gradient);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
            animation: pulse 2s infinite;
            transition: all 0.3s ease;
        }

        .logo-main:hover {
            transform: scale(1.1);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.5);
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        /* Form Styling */
        .form-control, .form-select {
            border: 2px solid var(--border-light);
            background: rgba(255, 255, 255, 0.98);
            border-radius: 16px;
            padding: 14px 20px;
            font-size: 0.95rem;
            font-weight: 500;
            transition: all 0.3s ease;
            color: var(--text-primary);
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--secondary);
            background: white;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
            outline: none;
        }

        .form-control::placeholder {
            color: var(--text-muted);
            font-weight: 400;
        }

        .form-control, .form-select {
            border-radius: 16px !important;
        }

        /* Password Input with Toggle */
        .password-input-container {
            position: relative;
        }

        .password-input {
            padding-right: 50px !important;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-secondary);
            cursor: pointer;
            z-index: 10;
            padding: 5px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .password-toggle:hover {
            background: rgba(0, 0, 0, 0.05);
            color: var(--secondary);
        }

        .password-toggle:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(102, 126, 234, 0.2);
        }

        
        /* Button Styling */
        .btn-primary-gradient {
            background: var(--secondary-gradient);
            border: none;
            border-radius: 16px;
            color: white;
            font-weight: 600;
            padding: 14px 32px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-primary-gradient:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .btn-primary-gradient:active {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-outline-primary {
            border: 2px solid var(--secondary);
            color: var(--secondary);
            border-radius: 16px;
            font-weight: 600;
            padding: 12px 28px;
            transition: all 0.3s ease;
            background: transparent;
        }

        .btn-outline-primary:hover {
            background: var(--secondary-gradient);
            border-color: transparent;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
            color: white;
        }

        /* Social Login Buttons */
        .social-btn {
            border: 2px solid rgba(255, 255, 255, 0.2);
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 16px;
            padding: 14px 18px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            font-size: 1.1rem;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .social-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            color: white;
        }

        /* Alert Styling */
        .alert {
            border: none;
            border-radius: 16px;
            backdrop-filter: blur(10px);
            font-weight: 500;
        }

        .alert-danger {
            background: rgba(252, 129, 129, 0.1);
            color: var(--danger);
            border: 1px solid rgba(252, 129, 129, 0.2);
        }

        .alert-success {
            background: rgba(72, 187, 120, 0.1);
            color: var(--success);
            border: 1px solid rgba(72, 187, 120, 0.2);
        }

        .alert-info {
            background: rgba(66, 153, 225, 0.1);
            color: var(--info);
            border: 1px solid rgba(66, 153, 225, 0.2);
        }

        /* Alert Styling */
        .alert {
            border: none;
            border-radius: 12px;
            backdrop-filter: blur(5px);
        }

        /* Loading Spinner */
        .spinner-border-sm {
            width: 1rem;
            height: 1rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .auth-card {
                margin: 20px;
                border-radius: 15px;
            }

            .logo-main {
                width: 60px;
                height: 60px;
            }
        }

        /* Additional decorative elements */
        .decorative-line {
            height: 4px;
            background: var(--primary-gradient);
            border-radius: 2px;
            margin: 1.5rem 0;
        }

        .feature-list {
            list-style: none;
            padding: 0;
        }

        .feature-list li {
            padding: 0.5rem 0;
            color: rgba(255, 255, 255, 0.9);
        }

        .feature-list i {
            color: #4facfe;
            margin-right: 0.5rem;
        }
    </style>

    @yield('styles')
</head>
<body>
    <!-- Animated Background -->
    <div class="bg-animation">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        <div class="floating-shape shape-3"></div>
    </div>

    <!-- Main Content -->
    <div class="container-fluid d-flex align-items-center justify-content-center min-vh-100 position-relative">
        @yield('content')
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    @yield('scripts')
</body>
</html>