<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Daftar - PT Solusi Koneksi Anda</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body>

    <div class="register-page">

        <div class="register-card">

            {{-- ========================================
                 LOGO
            ======================================== --}}

            <div class="register-logo">

                <img
                    src="{{ asset('images/logoperusahaan.png') }}"
                    alt="Logo PT Solusi Koneksi Anda"
                >

            </div>


            {{-- ========================================
                 JUDUL
            ======================================== --}}

            <div class="register-header">

                <h1>
                    Daftar
                </h1>

                <p>
                    Buat akun untuk mengakses website kami.
                </p>

            </div>


            {{-- ========================================
                 ERROR
            ======================================== --}}

            @if ($errors->any())

                <div class="register-error">

                    @foreach ($errors->all() as $error)

                        <div>
                            {{ $error }}
                        </div>

                    @endforeach

                </div>

            @endif


            {{-- ========================================
                 FORM REGISTER
            ======================================== --}}

            <form
                method="POST"
                action="{{ route('register') }}"
            >

                @csrf


                {{-- NAMA --}}

                <div class="form-group">

                    <label for="name">
                        Nama
                    </label>

                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Masukkan nama"
                        required
                        autofocus
                        autocomplete="name"
                    >

                </div>


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
                        autocomplete="username"
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


                {{-- KONFIRMASI PASSWORD --}}

                <div class="form-group">

                    <label for="password_confirmation">
                        Konfirmasi Password
                    </label>

                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        placeholder="Masukkan ulang password"
                        required
                        autocomplete="new-password"
                    >

                </div>


                {{-- TOMBOL DAFTAR --}}

                <button
                    type="submit"
                    class="register-submit"
                >
                    Daftar
                </button>

            </form>


            {{-- ========================================
                 LOGIN
            ======================================== --}}

            <div class="register-login">

                <span>
                    Sudah punya akun?
                </span>

                <a href="{{ route('login') }}">
                    Login sekarang
                </a>

            </div>

        </div>

    </div>


    {{-- ========================================
         STYLE REGISTER
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
           HALAMAN REGISTER
        ======================================== */

        .register-page {

            min-height: 100vh;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 40px 20px;

            background-color: #F7F9FC;
        }


        /* ========================================
           CARD REGISTER
        ======================================== */

        .register-card {

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

        .register-logo {

            display: flex;

            align-items: center;

            justify-content: center;

            margin-bottom: 18px;
        }


        .register-logo img {

            width: 72px;

            height: 72px;

            object-fit: contain;

            display: block;
        }


        /* ========================================
           HEADER
        ======================================== */

        .register-header {

            text-align: center;

            margin-bottom: 28px;
        }


        .register-header h1 {

            margin: 0;

            font-size: 28px;

            font-weight: 700;

            color: #111827;
        }


        .register-header p {

            margin: 8px 0 0;

            font-size: 15px;

            line-height: 1.5;

            color: #64748B;
        }


        /* ========================================
           ERROR
        ======================================== */

        .register-error {

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

        .form-group input {

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


        .form-group input:focus {

            border-color: #1769E0;

            box-shadow:
                0 0 0 3px rgba(23, 105, 224, 0.10);
        }


        /* ========================================
           BUTTON DAFTAR
        ======================================== */

        .register-submit {

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


        .register-submit:hover {

            background-color: #0B3D91;

            transform: translateY(-1px);
        }


        .register-submit:active {

            transform: translateY(0);
        }


        /* ========================================
           LINK LOGIN
        ======================================== */

        .register-login {

            margin-top: 20px;

            text-align: center;

            font-size: 14px;

            color: #64748B;
        }


        .register-login a {

            color: #1769E0;

            font-weight: 700;

            text-decoration: none;
        }


        .register-login a:hover {

            color: #0B3D91;

            text-decoration: underline;
        }


        /* ========================================
           RESPONSIVE HP
        ======================================== */

        @media (max-width: 480px) {

            .register-page {

                padding: 25px 15px;
            }


            .register-card {

                padding: 28px 22px;

                border-radius: 14px;
            }


            .register-logo img {

                width: 64px;

                height: 64px;
            }


            .register-header h1 {

                font-size: 25px;
            }


            .register-header p {

                font-size: 14px;
            }

        }

    </style>

</body>

</html>