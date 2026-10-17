<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Login - PT Solusi Koneksi Anda</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body>

    <div class="login-page">

        <div class="login-card">


            {{-- ========================================
                 LOGO
            ======================================== --}}

            <div class="login-logo">

                <img
                    src="{{ asset('images/logoperusahaan.png') }}"
                    alt="Logo PT Solusi Koneksi Anda"
                >

            </div>


            {{-- ========================================
                 JUDUL
            ======================================== --}}

            <div class="login-header">

                <h1>
                    Login
                </h1>

                <p>
                    Silakan masuk menggunakan akun Anda.
                </p>

            </div>


            {{-- ========================================
                 SESSION STATUS
            ======================================== --}}

            @if (session('status'))

                <div class="login-alert">

                    {{ session('status') }}

                </div>

            @endif


            {{-- ========================================
                 ERROR
            ======================================== --}}

            @if ($errors->any())

                <div class="login-error">

                    @foreach ($errors->all() as $error)

                        <div>
                            {{ $error }}
                        </div>

                    @endforeach

                </div>

            @endif


            {{-- ========================================
                 FORM LOGIN
            ======================================== --}}

            <form
                method="POST"
                action="{{ route('login') }}"
                autocomplete="off"
            >

                @csrf


                {{-- EMAIL --}}

                <div class="form-group">

                    <label for="email">
                        Email
                    </label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email"
                        required
                        autofocus
                        autocomplete="off"
                    >

                </div>


                {{-- PASSWORD --}}

                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="Masukkan password"
                        required
                        autocomplete="new-password"
                    >

                </div>


                {{-- ========================================
                     INGAT SAYA
                ======================================== --}}

                <div class="remember-area">

                    <label for="remember">

                        <input
                            id="remember"
                            type="checkbox"
                            name="remember"
                        >

                        <span>
                            Ingat saya
                        </span>

                    </label>

                </div>


                {{-- ========================================
                     TOMBOL LOGIN
                ======================================== --}}

                <button
                    type="submit"
                    class="login-submit"
                >
                    Masuk
                </button>

            </form>


            {{-- ========================================
                 REGISTER
            ======================================== --}}

            <div class="login-register">

                <span>
                    Belum punya akun?
                </span>

                <a href="{{ route('register') }}">
                    Daftar sekarang
                </a>

            </div>


            {{-- ========================================
                 LOGIN ADMIN
            ======================================== --}}

            <div class="login-admin">

                <span>
                    Login Admin?
                </span>

                <a href="{{ route('admin.login') }}">
                    Masuk sebagai Admin
                </a>

            </div>

        </div>

    </div>


    {{-- ========================================
         STYLE LOGIN
    ======================================== --}}

    <style>

        /* ========================================
           RESET
        ======================================== */

        * {
            box-sizing: border-box;
        }


        html,
        body {
            margin: 0;
            padding: 0;
        }


        body {
            font-family: Arial, sans-serif;

            background-color: #F7F9FC;

            color: #1F2937;
        }


        /* ========================================
           HALAMAN LOGIN
        ======================================== */

        .login-page {

            min-height: 100vh;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 40px 20px;

            background-color: #F7F9FC;
        }


        /* ========================================
           CARD LOGIN
        ======================================== */

        .login-card {

            width: 100%;

            max-width: 448px;

            background-color: #FFFFFF;

            border-radius: 16px;

            padding: 32px;

            box-shadow:
                0 8px 25px rgba(0, 0, 0, 0.06);
        }


        /* ========================================
           LOGO
        ======================================== */

        .login-logo {

            display: flex;

            align-items: center;

            justify-content: center;

            margin-bottom: 18px;
        }


        .login-logo img {

            width: 72px;

            height: 72px;

            object-fit: contain;

            display: block;
        }


        /* ========================================
           HEADER
        ======================================== */

        .login-header {

            text-align: center;

            margin-bottom: 28px;
        }


        .login-header h1 {

            margin: 0;

            font-size: 28px;

            font-weight: 700;

            color: #111827;
        }


        .login-header p {

            margin: 8px 0 0;

            font-size: 15px;

            line-height: 1.5;

            color: #64748B;
        }


        /* ========================================
           ALERT
        ======================================== */

        .login-alert {

            margin-bottom: 18px;

            padding: 11px 13px;

            border-radius: 10px;

            background-color: #EAF2FF;

            color: #0B3D91;

            font-size: 13px;
        }


        /* ========================================
           ERROR
        ======================================== */

        .login-error {

            margin-bottom: 18px;

            padding: 11px 13px;

            border-radius: 10px;

            background-color: #FEF2F2;

            color: #B91C1C;

            font-size: 13px;

            line-height: 1.5;
        }


        /* ========================================
           FORM GROUP
        ======================================== */

        .form-group {

            margin-bottom: 18px;
        }


        .form-group label {

            display: block;

            margin-bottom: 8px;

            font-size: 14px;

            font-weight: 600;

            color: #1F2937;
        }


        /* ========================================
           INPUT
        ======================================== */

        .form-group input[type="email"],
        .form-group input[type="password"] {

            width: 100%;

            height: 47px;

            padding: 0 15px;

            border: 1px solid #D9E1EC;

            border-radius: 12px;

            background-color: #FFFFFF;

            color: #1F2937;

            font-family: Arial, sans-serif;

            font-size: 14px;

            outline: none;

            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease;
        }


        .form-group input::placeholder {

            color: #94A3B8;
        }


        .form-group input[type="email"]:focus,
        .form-group input[type="password"]:focus {

            border-color: #1769E0;

            box-shadow:
                0 0 0 3px rgba(23, 105, 224, 0.10);
        }


        /* ========================================
           INGAT SAYA
        ======================================== */

        .remember-area {

            margin-top: 2px;

            margin-bottom: 20px;
        }


        .remember-area label {

            display: flex;

            align-items: center;

            gap: 8px;

            cursor: pointer;

            color: #475569;

            font-size: 14px;
        }


        .remember-area input[type="checkbox"] {

            width: 14px;

            height: 14px;

            margin: 0;

            accent-color: #1769E0;

            cursor: pointer;
        }


        /* ========================================
           BUTTON LOGIN
        ======================================== */

        .login-submit {

            width: 100%;

            height: 49px;

            padding: 0;

            border: none;

            border-radius: 12px;

            background-color: #1769E0;

            color: #FFFFFF;

            font-family: Arial, sans-serif;

            font-size: 16px;

            font-weight: 700;

            cursor: pointer;

            box-shadow:
                0 3px 6px rgba(23, 105, 224, 0.20);

            transition:
                background-color 0.2s ease,
                transform 0.2s ease;
        }


        .login-submit:hover {

            background-color: #0B3D91;

            transform: translateY(-1px);
        }


        .login-submit:active {

            transform: translateY(0);
        }


        /* ========================================
           REGISTER
        ======================================== */

        .login-register {

            margin-top: 18px;

            text-align: center;

            font-size: 14px;

            color: #64748B;
        }


        .login-register a {

            color: #1769E0;

            font-weight: 700;

            text-decoration: none;
        }


        .login-register a:hover {

            color: #0B3D91;

            text-decoration: underline;
        }


        /* ========================================
           LOGIN ADMIN
        ======================================== */

        .login-admin {

            margin-top: 16px;

            padding-top: 16px;

            border-top: 1px solid #E5E7EB;

            text-align: center;

            font-size: 14px;

            color: #64748B;
        }


        .login-admin a {

            color: #1769E0;

            font-weight: 700;

            text-decoration: none;
        }


        .login-admin a:hover {

            color: #0B3D91;

            text-decoration: underline;
        }


        /* ========================================
           RESPONSIVE HP
        ======================================== */

        @media (max-width: 480px) {

            .login-page {

                padding: 25px 15px;
            }


            .login-card {

                padding: 28px 22px;

                border-radius: 14px;
            }


            .login-logo img {

                width: 64px;

                height: 64px;
            }


            .login-header h1 {

                font-size: 25px;
            }


            .login-header p {

                font-size: 14px;
            }

        }

    </style>

</body>

</html>