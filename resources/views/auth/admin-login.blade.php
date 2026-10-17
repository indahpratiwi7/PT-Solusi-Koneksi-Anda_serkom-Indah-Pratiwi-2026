<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Login Admin - PT Solusi Koneksi Anda</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

<div class="admin-login-page">

    <div class="admin-login-card">

        {{-- LOGO --}}
        <div class="admin-login-logo">

            <img
                src="{{ asset('images/logoperusahaan.png') }}"
                alt="Logo PT Solusi Koneksi Anda"
            >

        </div>


        {{-- HEADER --}}
        <div class="admin-login-header">

            <h1>
                Login Admin
            </h1>

            <p>
                Silakan masuk untuk mengelola website.
            </p>

        </div>


        {{-- PESAN ERROR --}}
        @if ($errors->any())

            <div class="admin-error">
                {{ $errors->first() }}
            </div>

        @endif


        {{-- PESAN BERHASIL LOGOUT --}}
        @if (session('status'))

            <div class="admin-success">
                {{ session('status') }}
            </div>

        @endif


        {{-- FORM --}}
        <form
            method="POST"
            action="{{ route('admin.login.submit') }}"
            autocomplete="off"
        >

            @csrf


            {{-- EMAIL --}}
            <div class="admin-form-group">

                <label for="email">
                    Email Admin
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    placeholder="Masukkan email admin"
                    value=""
                    autocomplete="off"
                    required
                    autofocus
                >

            </div>


            {{-- PASSWORD --}}
            <div class="admin-form-group">

                <label for="password">
                    Password
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="Masukkan password"
                    value=""
                    autocomplete="new-password"
                    required
                >

            </div>


            {{-- REMEMBER --}}
            <div class="admin-remember">

                <label>

                    <input
                        type="checkbox"
                        name="remember"
                        value="1"
                    >

                    <span>
                        Ingat saya
                    </span>

                </label>

            </div>


            {{-- BUTTON --}}
            <button
                type="submit"
                class="admin-login-button"
            >
                Masuk sebagai Admin
            </button>

        </form>


        {{-- KEMBALI KE USER --}}
        <div class="admin-back-login">

            <a href="{{ route('login') }}">
                ← Kembali ke Login User
            </a>

        </div>

    </div>

</div>


<style>

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
   PAGE
======================================== */

.admin-login-page {

    min-height: 100vh;

    display: flex;

    align-items: center;

    justify-content: center;

    padding: 40px 20px;

    background-color: #F7F9FC;

}


/* ========================================
   CARD
======================================== */

.admin-login-card {

    width: 100%;

    max-width: 448px;

    padding: 32px;

    background-color: #FFFFFF;

    border-radius: 16px;

    box-shadow:
        0 8px 25px rgba(0, 0, 0, 0.06);

}


/* ========================================
   LOGO
======================================== */

.admin-login-logo {

    display: flex;

    justify-content: center;

    align-items: center;

    margin-bottom: 22px;

}

.admin-login-logo img {

    width: 72px;

    height: 72px;

    object-fit: contain;

    display: block;

}


/* ========================================
   HEADER
======================================== */

.admin-login-header {

    text-align: center;

    margin-bottom: 28px;

}

.admin-login-header h1 {

    margin: 0;

    color: #111827;

    font-size: 28px;

    font-weight: 700;

}

.admin-login-header p {

    margin: 8px 0 0;

    color: #64748B;

    font-size: 15px;

}


/* ========================================
   ERROR
======================================== */

.admin-error {

    margin-bottom: 20px;

    padding: 12px 14px;

    border-radius: 10px;

    background-color: #FEF2F2;

    border: 1px solid #FECACA;

    color: #B91C1C;

    font-size: 14px;

    line-height: 1.5;

}


/* ========================================
   SUCCESS
======================================== */

.admin-success {

    margin-bottom: 20px;

    padding: 12px 14px;

    border-radius: 10px;

    background-color: #F0FDF4;

    border: 1px solid #BBF7D0;

    color: #15803D;

    font-size: 14px;

    line-height: 1.5;

}


/* ========================================
   FORM
======================================== */

.admin-form-group {

    margin-bottom: 18px;

}

.admin-form-group label {

    display: block;

    margin-bottom: 8px;

    color: #1F2937;

    font-size: 14px;

    font-weight: 600;

}

.admin-form-group input {

    width: 100%;

    height: 47px;

    padding: 0 15px;

    border: 1px solid #D9E1EC;

    border-radius: 12px;

    outline: none;

    background-color: #FFFFFF;

    color: #1F2937;

    font-size: 14px;

    transition:
        border-color 0.2s ease,
        box-shadow 0.2s ease;

}

.admin-form-group input::placeholder {

    color: #94A3B8;

}

.admin-form-group input:focus {

    border-color: #1769E0;

    box-shadow:
        0 0 0 3px rgba(23, 105, 224, 0.10);

}


/* ========================================
   REMEMBER
======================================== */

.admin-remember {

    margin-bottom: 20px;

}

.admin-remember label {

    display: flex;

    align-items: center;

    gap: 8px;

    color: #475569;

    font-size: 14px;

    cursor: pointer;

}

.admin-remember input {

    width: 14px;

    height: 14px;

    accent-color: #1769E0;

}


/* ========================================
   BUTTON
======================================== */

.admin-login-button {

    width: 100%;

    height: 49px;

    border: none;

    border-radius: 12px;

    background-color: #1769E0;

    color: #FFFFFF;

    font-size: 16px;

    font-weight: 700;

    cursor: pointer;

    box-shadow:
        0 3px 6px rgba(23, 105, 224, 0.20);

    transition:
        background-color 0.2s ease,
        transform 0.2s ease;

}

.admin-login-button:hover {

    background-color: #0B3D91;

    transform: translateY(-1px);

}


/* ========================================
   BACK
======================================== */

.admin-back-login {

    margin-top: 20px;

    text-align: center;

}

.admin-back-login a {

    color: #1769E0;

    font-size: 14px;

    font-weight: 600;

    text-decoration: none;

}

.admin-back-login a:hover {

    color: #0B3D91;

    text-decoration: underline;

}


/* ========================================
   RESPONSIVE
======================================== */

@media (max-width: 480px) {

    .admin-login-page {

        padding: 25px 15px;

    }

    .admin-login-card {

        padding: 28px 22px;

        border-radius: 14px;

    }

    .admin-login-logo img {

        width: 64px;

        height: 64px;

    }

    .admin-login-header h1 {

        font-size: 25px;

    }

}

</style>

</body>

</html>