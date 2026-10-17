@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('page-title', 'Dashboard Admin')

@section('content')

    {{-- HEADER --}}
    <div class="mb-4">
        <h1 class="admin-page-title">
            Selamat Datang, {{ auth()->user()->name }} 👋
        </h1>

        <p class="admin-page-description">
            Kelola informasi dan konten website PT Solusi Koneksi Anda melalui dashboard admin.
        </p>
    </div>


    {{-- STATISTIK --}}
    <div class="row g-4 mb-4">

        {{-- PRODUK --}}
        <div class="col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-start">

                        <div>
                            <p class="text-secondary mb-2">
                                Produk & Layanan
                            </p>

                            <h2 class="fw-bold mb-0">
                                {{ \App\Models\Product::count() }}
                            </h2>
                        </div>

                        <div
                            class="rounded-3 d-flex align-items-center justify-content-center"
                            style="
                                width: 48px;
                                height: 48px;
                                background-color: #EAF2FF;
                                font-size: 22px;
                            "
                        >
                            📦
                        </div>

                    </div>

                </div>

            </div>
        </div>


        {{-- ARTIKEL --}}
        <div class="col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-start">

                        <div>
                            <p class="text-secondary mb-2">
                                Artikel
                            </p>

                            <h2 class="fw-bold mb-0">
                                {{ \App\Models\Article::count() }}
                            </h2>
                        </div>

                        <div
                            class="rounded-3 d-flex align-items-center justify-content-center"
                            style="
                                width: 48px;
                                height: 48px;
                                background-color: #EAF2FF;
                                font-size: 22px;
                            "
                        >
                            📰
                        </div>

                    </div>

                </div>

            </div>
        </div>


        {{-- GALERI --}}
        <div class="col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-start">

                        <div>
                            <p class="text-secondary mb-2">
                                Galeri
                            </p>

                            <h2 class="fw-bold mb-0">
                                {{ \App\Models\Gallery::count() }}
                            </h2>
                        </div>

                        <div
                            class="rounded-3 d-flex align-items-center justify-content-center"
                            style="
                                width: 48px;
                                height: 48px;
                                background-color: #EAF2FF;
                                font-size: 22px;
                            "
                        >
                            🖼️
                        </div>

                    </div>

                </div>

            </div>
        </div>


        {{-- PESAN --}}
        <div class="col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-start">

                        <div>
                            <p class="text-secondary mb-2">
                                Pesan Masuk
                            </p>

                            <h2 class="fw-bold mb-0">
                                {{ \App\Models\ContactMessage::count() }}
                            </h2>
                        </div>

                        <div
                            class="rounded-3 d-flex align-items-center justify-content-center"
                            style="
                                width: 48px;
                                height: 48px;
                                background-color: #EAF2FF;
                                font-size: 22px;
                            "
                        >
                            💬
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>


    {{-- MENU CEPAT --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <h5 class="fw-bold mb-1">
                Menu Cepat
            </h5>

            <p class="text-secondary mb-4">
                Akses fitur pengelolaan website dengan cepat.
            </p>


            <div class="row g-3">

                {{-- PRODUK --}}
                <div class="col-md-6 col-lg-3">

                    <a
                        href="{{ route('admin.products.index') }}"
                        class="text-decoration-none"
                    >

                        <div
                            class="border rounded-3 p-3 h-100"
                            style="transition: 0.2s ease;"
                        >

                            <div class="fs-3 mb-2">
                                📦
                            </div>

                            <h6 class="fw-bold text-dark mb-1">
                                Produk & Layanan
                            </h6>

                            <p class="text-secondary small mb-0">
                                Kelola produk dan layanan perusahaan.
                            </p>

                        </div>

                    </a>

                </div>


                {{-- ARTIKEL --}}
                <div class="col-md-6 col-lg-3">

                    <a
                        href="{{ route('admin.articles.index') }}"
                        class="text-decoration-none"
                    >

                        <div
                            class="border rounded-3 p-3 h-100"
                            style="transition: 0.2s ease;"
                        >

                            <div class="fs-3 mb-2">
                                📰
                            </div>

                            <h6 class="fw-bold text-dark mb-1">
                                Artikel
                            </h6>

                            <p class="text-secondary small mb-0">
                                Tambah dan kelola artikel perusahaan.
                            </p>

                        </div>

                    </a>

                </div>


                {{-- GALERI --}}
                <div class="col-md-6 col-lg-3">

                    <a
                        href="{{ route('admin.gallery.index') }}"
                        class="text-decoration-none"
                    >

                        <div
                            class="border rounded-3 p-3 h-100"
                            style="transition: 0.2s ease;"
                        >

                            <div class="fs-3 mb-2">
                                🖼️
                            </div>

                            <h6 class="fw-bold text-dark mb-1">
                                Galeri
                            </h6>

                            <p class="text-secondary small mb-0">
                                Kelola dokumentasi kegiatan perusahaan.
                            </p>

                        </div>

                    </a>

                </div>


                {{-- PESAN --}}
                <div class="col-md-6 col-lg-3">

                    <a
                        href="{{ route('admin.messages.index') }}"
                        class="text-decoration-none"
                    >

                        <div
                            class="border rounded-3 p-3 h-100"
                            style="transition: 0.2s ease;"
                        >

                            <div class="fs-3 mb-2">
                                💬
                            </div>

                            <h6 class="fw-bold text-dark mb-1">
                                Pesan Masuk
                            </h6>

                            <p class="text-secondary small mb-0">
                                Lihat pesan dari pengunjung website.
                            </p>

                        </div>

                    </a>

                </div>

            </div>

        </div>

    </div>

@endsection