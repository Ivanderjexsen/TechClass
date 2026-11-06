
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin | TechClass</title>

    <link rel="stylesheet" href="{{ asset('admin/css/auth.css') }}">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #eff6ff, #dbeafe, #f8fafc);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 25px;
            color: #1e293b;
        }

        .login-container {
            width: 100%;
            max-width: 440px;
            background: #ffffff;
            padding: 42px;
            border-radius: 18px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 20px 50px rgba(30, 64, 175, 0.10);
        }

        .brand {
            text-align: center;
            margin-bottom: 30px;
        }

        .brand-icon {
            width: 58px;
            height: 58px;
            background: #eff6ff;
            color: #2563eb;
            border-radius: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 15px;
            font-size: 25px;
            font-weight: bold;
        }

        .brand h2 {
            font-size: 25px;
            color: #1d4ed8;
            font-weight: bold;
        }

        .brand p {
            font-size: 13px;
            color: #94a3b8;
            margin-top: 5px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 28px;
        }

        .login-header h1 {
            color: #0f172a;
            font-size: 25px;
            margin-bottom: 8px;
        }

        .login-header p {
            color: #64748b;
            font-size: 14px;
            line-height: 1.6;
        }

        .alert-success,
        .alert-error {
            padding: 13px 15px;
            border-radius: 9px;
            font-size: 13px;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .alert-success {
            background: #dcfce7;
            border: 1px solid #bbf7d0;
            color: #166534;
        }

        .alert-error {
            background: #fee2e2;
            border: 1px solid #fecaca;
            color: #991b1b;
        }

        .form-group {
            margin-bottom: 21px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 9px;
        }

        .form-control {
            display: block;
            width: 100%;
            height: 48px;
            padding: 0 14px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            background: #ffffff;
            color: #1e293b;
            font-size: 14px;
            outline: none;
            transition: 0.2s;
        }

        .form-control::placeholder {
            color: #94a3b8;
        }

        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        .password-wrapper {
            position: relative;
            width: 100%;
        }

        .password-wrapper .form-control {
            padding-right: 48px;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            cursor: pointer;
            padding: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748b;
        }

        .toggle-password:hover {
            color: #2563eb;
        }

        .toggle-password svg {
            width: 21px;
            height: 21px;
        }

        .error-message {
            color: #dc2626;
            font-size: 12px;
            margin-top: 7px;
        }

        .login-button {
            display: block;
            width: 100%;
            height: 49px;
            background: #2563eb;
            color: #ffffff;
            border: none;
            border-radius: 9px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
            margin-top: 8px;
        }

        .login-button:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 7px 15px rgba(37, 99, 235, 0.2);
        }

        .back-link {
            display: block;
            text-align: center;
            color: #64748b;
            font-size: 13px;
            margin-top: 25px;
            transition: 0.2s;
        }

        .back-link:hover {
            color: #2563eb;
        }

        .login-footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #f1f5f9;
            color: #94a3b8;
            font-size: 11px;
        }

        @media (max-width: 480px) {
            body {
                padding: 18px;
            }

            .login-container {
                padding: 30px 23px;
            }

            .login-header h1 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

    <main class="login-container">

        <!-- BRAND -->
        <div class="brand">
            <div class="brand-icon">
                &lt;/&gt;
            </div>

            <h2>TechClass.</h2>
            <p>Platform Pelatihan Teknologi</p>
        </div>

        <!-- HEADER -->
        <header class="login-header">
            <h1>Selamat Datang!</h1>
            <p>
                Silakan masuk menggunakan akun administrator
                untuk mengelola TechClass.
            </p>
        </header>

        <!-- NOTIFIKASI -->
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert-error">
                {{ session('error') }}
            </div>
        @endif

        <!-- FORM LOGIN -->
        <form action="{{ route('admin.login.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Alamat Email</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email admin"
                    autocomplete="username"
                    required
                    autofocus
                >

                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="kata_sandi">Kata Sandi</label>

                <div class="password-wrapper">
                    <input
                        type="password"
                        id="kata_sandi"
                        name="kata_sandi"
                        class="form-control"
                        placeholder="Masukkan kata sandi"
                        autocomplete="current-password"
                        required
                    >

                    <button
                        type="button"
                        class="toggle-password"
                        id="togglePassword"
                        aria-label="Tampilkan kata sandi"
                        aria-pressed="false"
                    >
                        <svg
                            id="eyeIcon"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true"
                        >
                            <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                    </button>
                </div>

                @error('kata_sandi')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="login-button">
                Masuk ke Dashboard &rarr;
            </button>
        </form>

        <!-- KEMBALI -->
        <a href="{{ route('landing') }}" class="back-link">
            &larr; Kembali ke halaman utama
        </a>

        <!-- FOOTER -->
        <div class="login-footer">
            &copy; {{ date('Y') }} TechClass. All rights reserved.
        </div>

    </main>

    <!-- JAVASCRIPT TOGGLE PASSWORD -->
    <script>
        const passwordInput = document.getElementById('kata_sandi');
        const togglePassword = document.getElementById('togglePassword');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function () {
            const passwordVisible = passwordInput.type === 'password';

            passwordInput.type = passwordVisible ? 'text' : 'password';

            if (passwordVisible) {
                eyeIcon.innerHTML = `
                    <path d="M3 3l18 18"/>
                    <path d="M10.6 10.6a2 2 0 0 0 2.8 2.8"/>
                    <path d="M9.9 5.2A11 11 0 0 1 12 5c6.5 0 10 7 10 7a14 14 0 0 1-3.1 3.8"/>
                    <path d="M6.6 6.6C3.6 8.5 2 12 2 12s3.5 7 10 7a10 10 0 0 0 4-.8"/>
                `;

                togglePassword.setAttribute(
                    'aria-label',
                    'Sembunyikan kata sandi'
                );

                togglePassword.setAttribute('aria-pressed', 'true');

            } else {
                eyeIcon.innerHTML = `
                    <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/>
                    <circle cx="12" cy="12" r="3"/>
                `;

                togglePassword.setAttribute(
                    'aria-label',
                    'Tampilkan kata sandi'
                );

                togglePassword.setAttribute('aria-pressed', 'false');
            }
        });
    </script>

</body>
</html>
