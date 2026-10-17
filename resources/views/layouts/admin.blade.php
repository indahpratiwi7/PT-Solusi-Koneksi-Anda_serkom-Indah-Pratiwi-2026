<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Dashboard') - PT Solusi Koneksi Anda</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-color: #f5f7fb;
            color: #1f2937;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .admin-wrapper {
            min-height: 100vh;
            display: flex;
        }

        /* SIDEBAR */
        .admin-sidebar {
            width: 250px;
            min-height: 100vh;
            background-color: #0B3D91;
            color: white;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 1000;
        }

        .admin-logo {
            padding: 22px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        }

        .admin-logo img {
            width: 48px;
            height: 48px;
            object-fit: contain;
            background: white;
            border-radius: 10px;
            padding: 5px;
        }

        .admin-logo-text {
            font-size: 16px;
            font-weight: 700;
            line-height: 1.3;
        }

        .admin-label {
            font-size: 11px;
            opacity: 0.7;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* MENU */
        .admin-menu {
            padding: 20px 12px;
        }

        .admin-menu-title {
            font-size: 11px;
            text-transform: uppercase;
            opacity: 0.6;
            padding: 0 12px;
            margin-bottom: 8px;
        }

        .admin-menu a,
        .admin-menu button {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 13px;
            margin-bottom: 5px;
            border: none;
            border-radius: 8px;
            background: transparent;
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-size: 14px;
            text-align: left;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .admin-menu a:hover,
        .admin-menu a.active,
        .admin-menu button:hover {
            background-color: rgba(255, 255, 255, 0.15);
            color: white;
        }

        .admin-menu-icon {
            width: 22px;
            text-align: center;
            font-size: 17px;
        }

        .admin-logout {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid rgba(255, 255, 255, 0.15);
        }

        /* MAIN */
        .admin-main {
            width: calc(100% - 250px);
            margin-left: 250px;
            min-height: 100vh;
        }

        /* TOPBAR */
        .admin-topbar {
            height: 72px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
        }

        .admin-topbar-title {
            font-size: 20px;
            font-weight: 700;
            color: #1f2937;
        }

        .admin-user {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .admin-user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background-color: #EAF2FF;
            color: #0B3D91;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .admin-user-name {
            font-size: 14px;
            font-weight: 600;
        }

        .admin-user-role {
            font-size: 11px;
            color: #6b7280;
        }

        /* CONTENT */
        .admin-content {
            padding: 30px;
        }

        .admin-page-title {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 6px;
            color: #1f2937;
        }

        .admin-page-description {
            color: #6b7280;
            margin-bottom: 25px;
        }

        /* MOBILE */
        @media (max-width: 991.98px) {

            .admin-sidebar {
                width: 220px;
            }

            .admin-main {
                width: calc(100% - 220px);
                margin-left: 220px;
            }

            .admin-topbar {
                padding: 0 20px;
            }

            .admin-content {
                padding: 20px;
            }
        }

        @media (max-width: 767.98px) {

            .admin-sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }

            .admin-wrapper {
                display: block;
            }

            .admin-main {
                width: 100%;
                margin-left: 0;
            }

            .admin-topbar {
                height: auto;
                min-height: 65px;
                padding: 12px 15px;
            }

            .admin-content {
                padding: 18px 15px;
            }

            .admin-user-name,
            .admin-user-role {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="admin-wrapper">

        {{-- SIDEBAR --}}
        <aside class="admin-sidebar">

            {{-- LOGO --}}
            <div class="admin-logo">

                <div class="d-flex align-items-center gap-3">

                    <img
                        src="{{ asset('images/logoperusahaan.png') }}"
                        alt="Logo PT Solusi Koneksi Anda"
                    >

                    <div>
                        <div class="admin-logo-text">
                            PT Solusi Koneksi Anda
                        </div>

                        <div class="admin-label">
                            Admin Panel
                        </div>
                    </div>

                </div>

            </div>

            {{-- MENU --}}
            <div class="admin-menu">

                <div class="admin-menu-title">
                    Menu Utama
                </div>

                {{-- DASHBOARD --}}
                <a
                    href="{{ route('admin.dashboard') }}"
                    class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                >
                    <span class="admin-menu-icon">🏠</span>
                    <span>Dashboard</span>
                </a>

                {{-- PRODUK --}}
                <a
                    href="{{ route('admin.products.index') }}"
                    class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}"
                >
                    <span class="admin-menu-icon">📦</span>
                    <span>Produk & Layanan</span>
                </a>

                {{-- ARTIKEL --}}
                <a
                    href="{{ route('admin.articles.index') }}"
                    class="{{ request()->routeIs('admin.articles.*') ? 'active' : '' }}"
                >
                    <span class="admin-menu-icon">📰</span>
                    <span>Artikel</span>
                </a>

                {{-- GALERI --}}
                <a
                    href="{{ route('admin.gallery.index') }}"
                    class="{{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}"
                >
                    <span class="admin-menu-icon">🖼️</span>
                    <span>Galeri</span>
                </a>

                {{-- PESAN --}}
                <a
                    href="{{ route('admin.messages.index') }}"
                    class="{{ request()->routeIs('admin.messages.*') ? 'active' : '' }}"
                >
                    <span class="admin-menu-icon">💬</span>
                    <span>Pesan Masuk</span>
                </a>

                {{-- PROFIL --}}
                <a
                    href="{{ route('admin.profile.edit') }}"
                    class="{{ request()->routeIs('admin.profile.*') ? 'active' : '' }}"
                >
                    <span class="admin-menu-icon">👤</span>
                    <span>Profil Admin</span>
                </a>

                {{-- PEMISAH --}}
                <div class="admin-logout">

                    {{-- LIHAT WEBSITE --}}
                    <a href="{{ route('home') }}" target="_blank">
                        <span class="admin-menu-icon">🌐</span>
                        <span>Lihat Website</span>
                    </a>

                    {{-- LOGOUT --}}
                    <form
                        method="POST"
                        action="{{ route('logout') }}"
                    >
                        @csrf

                        <button type="submit">
                            <span class="admin-menu-icon">🚪</span>
                            <span>Logout</span>
                        </button>
                    </form>

                </div>

            </div>

        </aside>


        {{-- MAIN CONTENT --}}
        <main class="admin-main">

            {{-- TOPBAR --}}
            <header class="admin-topbar">

                <div class="admin-topbar-title">
                    @yield('page-title', 'Dashboard Admin')
                </div>

                @auth
                    <div class="admin-user">

                        <div class="admin-user-avatar">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>

                        <div>
                            <div class="admin-user-name">
                                {{ auth()->user()->name }}
                            </div>

                            <div class="admin-user-role">
                                Administrator
                            </div>
                        </div>

                    </div>
                @endauth

            </header>


            {{-- PAGE CONTENT --}}
            <div class="admin-content">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')

            </div>

        </main>

    </div>

</body>

</html>