<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'PT Solusi Koneksi Anda')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* =========================
           NAVBAR
        ========================== */

        .main-navbar {
            background-color: #0B3D91;
        }

        .main-navbar .navbar-brand {
            color: #ffffff !important;
        }

        .main-navbar .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .main-navbar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.12);
            color: #ffffff !important;
        }

        .main-navbar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.15);
            color: #ffffff !important;
        }


        /* =========================
           LOGIN / LOGOUT BUTTON
        ========================== */

        .login-button {
            background-color: #ffffff;
            color: #0B3D91 !important;
            border: 2px solid #ffffff;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .login-button:hover {
            background-color: #1769E0;
            color: #ffffff !important;
            border-color: #1769E0;
        }

        .logout-button {
            background-color: #ffffff;
            color: #0B3D91 !important;
            border: 2px solid #ffffff;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .logout-button:hover {
            background-color: #1769E0;
            color: #ffffff !important;
            border-color: #1769E0;
        }


        /* =========================
           FOOTER
        ========================== */

        .main-footer {
            background-color: #0B3D91;
        }

        .main-footer a {
            color: #ffffff !important;
            transition: opacity 0.2s ease;
        }

        .main-footer a:hover {
            opacity: 0.75;
        }


        /* =========================
           CONTACT FOOTER
        ========================== */

        .contact-item {
            margin-bottom: 16px;
        }

        .contact-item:last-child {
            margin-bottom: 0;
        }
    </style>

</head>


<body class="d-flex flex-column min-vh-100">


    {{-- =====================================================
        NAVBAR
    ====================================================== --}}

    <nav class="navbar navbar-expand-lg navbar-dark main-navbar shadow-sm">

        <div class="container">

            {{-- LOGO + NAMA PERUSAHAAN --}}
            <a
                class="navbar-brand d-flex align-items-center gap-2"
                href="{{ route('home') }}"
            >

                <img
                    src="{{ asset('images/logoperusahaan.png') }}"
                    alt="Logo PT Solusi Koneksi Anda"
                    style="
                        width: 45px;
                        height: 45px;
                        object-fit: contain;
                    "
                >

                <div class="d-flex flex-column">

                    <span class="fw-bold lh-1">
                        PT Solusi Koneksi Anda
                    </span>

                    <small
                        class="text-white-50 mt-1"
                        style="font-size: 11px;"
                    >
                        Company Profile
                    </small>

                </div>

            </a>


            {{-- BUTTON MENU MOBILE --}}
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >

                <span class="navbar-toggler-icon"></span>

            </button>


            {{-- MENU NAVBAR --}}
            <div
                class="collapse navbar-collapse"
                id="navbarNav"
            >

                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">


                    {{-- HOME --}}
                    <li class="nav-item">

                        <a
                            href="{{ route('home') }}"
                            class="nav-link px-3 {{ request()->routeIs('home') ? 'active fw-semibold' : '' }}"
                        >
                            Home
                        </a>

                    </li>


                    {{-- PROFIL PERUSAHAAN --}}
                    <li class="nav-item">

                        <a
                            href="{{ route('profile') }}"
                            class="nav-link px-3 {{ request()->routeIs('profile') ? 'active fw-semibold' : '' }}"
                        >
                            Profil Perusahaan
                        </a>

                    </li>


                    {{-- PRODUK / LAYANAN --}}
                    <li class="nav-item">

                        <a
                            href="{{ route('products.index') }}"
                            class="nav-link px-3 {{ request()->routeIs('products.*') ? 'active fw-semibold' : '' }}"
                        >
                            Produk/Layanan
                        </a>

                    </li>


                    {{-- ARTIKEL --}}
                    <li class="nav-item">

                        <a
                            href="{{ route('articles.index') }}"
                            class="nav-link px-3 {{ request()->routeIs('articles.*') ? 'active fw-semibold' : '' }}"
                        >
                            Artikel
                        </a>

                    </li>


                    {{-- GALERI --}}
                    <li class="nav-item">

                        <a
                            href="{{ route('gallery.index') }}"
                            class="nav-link px-3 {{ request()->routeIs('gallery.*') ? 'active fw-semibold' : '' }}"
                        >
                            Galeri
                        </a>

                    </li>


                    {{-- KONTAK --}}
                    <li class="nav-item">

                        <a
                            href="{{ route('contact') }}"
                            class="nav-link px-3 {{ request()->routeIs('contact') ? 'active fw-semibold' : '' }}"
                        >
                            Kontak
                        </a>

                    </li>


                    {{-- PEMBATAS --}}
                    <li class="nav-item d-none d-lg-block">

                        <span
                            class="text-white-50 mx-2"
                            style="font-size: 20px;"
                        >
                            |
                        </span>

                    </li>


                    {{-- LOGIN / LOGOUT --}}
                    @guest

                        {{-- LOGIN --}}
                        <li class="nav-item mt-2 mt-lg-0">

                            <a
                                href="{{ route('login') }}"
                                class="btn login-button px-4 fw-semibold"
                            >
                                Login
                            </a>

                        </li>

                    @else

                        {{-- LOGOUT --}}
                        <li class="nav-item mt-2 mt-lg-0">

                            <form
                                method="POST"
                                action="{{ route('logout') }}"
                                class="m-0"
                            >

                                @csrf

                                <button
                                    type="submit"
                                    class="btn logout-button px-4 fw-semibold"
                                >
                                    Logout
                                </button>

                            </form>

                        </li>

                    @endguest


                </ul>

            </div>

        </div>

    </nav>



    {{-- =====================================================
        KONTEN HALAMAN
    ====================================================== --}}

    <main class="flex-grow-1">

        @yield('content')

    </main>



    {{-- =====================================================
        FOOTER
    ====================================================== --}}

    <footer class="main-footer mt-5">

        <div class="container py-5">

            <div class="row g-5">


                {{-- INFORMASI PERUSAHAAN --}}
                <div class="col-lg-5 col-md-6">

                    <div class="d-flex align-items-center gap-3 mb-3">

                        <img
                            src="{{ asset('images/logoperusahaan.png') }}"
                            alt="Logo PT Solusi Koneksi Anda"
                            style="
                                width: 55px;
                                height: 55px;
                                object-fit: contain;
                            "
                        >

                        <h4 class="fw-bold mb-0 text-white">
                            PT Solusi Koneksi Anda
                        </h4>

                    </div>


                    <p class="text-white mb-3">
                        Solusi koneksi dan layanan digital untuk membantu
                        memenuhi kebutuhan bisnis dan perusahaan Anda.
                    </p>


                    <p class="text-white mb-0">
                        Kami hadir sebagai partner dalam menyediakan produk,
                        layanan, dan solusi digital yang sesuai dengan
                        kebutuhan bisnis.
                    </p>

                </div>



                {{-- MENU FOOTER --}}
                <div class="col-lg-3 col-md-6">

                    <h5 class="fw-bold mb-3 text-white">
                        Menu
                    </h5>


                    <ul class="list-unstyled mb-0">

                        <li class="mb-2">

                            <a
                                href="{{ route('home') }}"
                                class="text-decoration-none"
                            >
                                Home
                            </a>

                        </li>


                        <li class="mb-2">

                            <a
                                href="{{ route('profile') }}"
                                class="text-decoration-none"
                            >
                                Profil Perusahaan
                            </a>

                        </li>


                        <li class="mb-2">

                            <a
                                href="{{ route('products.index') }}"
                                class="text-decoration-none"
                            >
                                Produk & Layanan
                            </a>

                        </li>


                        <li class="mb-2">

                            <a
                                href="{{ route('articles.index') }}"
                                class="text-decoration-none"
                            >
                                Artikel
                            </a>

                        </li>


                        <li class="mb-2">

                            <a
                                href="{{ route('gallery.index') }}"
                                class="text-decoration-none"
                            >
                                Galeri Kegiatan
                            </a>

                        </li>


                        <li>

                            <a
                                href="{{ route('contact') }}"
                                class="text-decoration-none"
                            >
                                Kontak Kami
                            </a>

                        </li>

                    </ul>

                </div>



                {{-- HUBUNGI KAMI --}}
                <div class="col-lg-4 col-md-12">

                    <h5 class="fw-bold mb-3 text-white">
                        Hubungi Kami
                    </h5>


                    {{-- ALAMAT --}}
                    <div class="d-flex contact-item">

                        <div class="me-3 fs-5">
                            📍
                        </div>

                        <div>

                            <div class="fw-semibold text-white">
                                Alamat
                            </div>

                            <div class="text-white">
                                Jl. Raya Padjajaran No. 88F Kota Bogor, 161563.
                            </div>

                        </div>

                    </div>


                    {{-- EMAIL --}}
                    <div class="d-flex contact-item">

                        <div class="me-3 fs-5">
                            ✉️
                        </div>

                        <div>

                            <div class="fw-semibold text-white">
                                Email
                            </div>

                            <div class="text-white">
                                info@ptsolusikoneksi.com
                            </div>

                        </div>

                    </div>


                    {{-- JAM BUKA --}}
                    <div class="d-flex contact-item">

                        <div class="me-3 fs-5">
                            🕐
                        </div>

                        <div>

                            <div class="fw-semibold text-white">
                                Jam Buka
                            </div>

                            <div class="text-white">
                                Senin - Jumat, 07.00 - 22.00
                            </div>

                        </div>

                    </div>


                    {{-- TELEPON --}}
                    <div class="d-flex contact-item">

                        <div class="me-3 fs-5">
                            📞
                        </div>

                        <div>

                            <div class="fw-semibold text-white">
                                Telepon
                            </div>

                            <div class="text-white">
                                0812-3456-7890
                            </div>

                        </div>

                    </div>


                </div>

            </div>



            {{-- GARIS PEMISAH --}}
            <hr class="border-light my-4">



            {{-- COPYRIGHT --}}
            <div class="row align-items-center">

                <div class="col-md-7">

                    <p class="mb-0 text-white">

                        &copy; {{ date('Y') }}

                        <span class="fw-semibold">
                            PT Solusi Koneksi Anda
                        </span>

                        . All Rights Reserved.

                    </p>

                </div>


                <div class="col-md-5 text-md-end mt-2 mt-md-0">

                    <small class="text-white">
                        Company Profile
                    </small>

                </div>

            </div>

        </div>

    </footer>


</body>

</html>
