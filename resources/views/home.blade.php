@extends('layouts.app')

@section('title', 'Home - PT Solusi Koneksi Anda')

@section('content')

{{-- HERO --}}
<section class="bg-light home-hero">
    <div class="container py-5">

        <div class="row align-items-center g-5 home-hero-row">

            {{-- BAGIAN KIRI --}}
            <div class="col-lg-6 home-hero-content">

                {{-- BADGE PERUSAHAAN --}}
                <div class="company-badge mb-3">
                    <span class="company-badge-dot"></span>
                    <span>PT Solusi Koneksi Anda</span>
                </div>


                {{-- JUDUL --}}
                <h1 class="display-4 fw-bold mb-3">
                    Solusi Koneksi untuk Kebutuhan Bisnis Anda
                </h1>


                {{-- DESKRIPSI --}}
                <p class="lead text-secondary mb-4">
                    Kami menyediakan produk dan layanan yang membantu
                    kebutuhan koneksi serta solusi digital untuk bisnis.
                </p>


                {{-- BUTTON --}}
                <div class="d-flex flex-wrap gap-2">

                    <a
                        href="{{ route('products.index') }}"
                        class="btn btn-primary btn-lg"
                    >
                        Lihat Produk &amp; Layanan
                    </a>

                    <a
                        href="{{ route('contact') }}"
                        class="btn btn-outline-primary btn-lg"
                    >
                        Hubungi Kami
                    </a>

                </div>

            </div>


            {{-- BAGIAN KANAN: FOTO GEDUNG --}}
            <div class="col-lg-6 home-hero-image">

                <div class="hero-building">

                    <img
                        src="{{ asset('images/gedung-perusahaan.png') }}"
                        alt="Gedung PT Solusi Koneksi Anda"
                    >

                </div>

            </div>

        </div>

    </div>
</section>



{{-- MENGAPA MEMILIH KAMI --}}
<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Mengapa Memilih Kami?
            </h2>

            <p class="text-secondary">
                Kami berkomitmen memberikan solusi yang sesuai dengan
                kebutuhan perusahaan.
            </p>

        </div>


        <div class="row g-4">

            {{-- KONEKSI --}}
            <div class="col-md-4">

                <div class="card h-100 border-0 shadow-sm">

                    <div class="card-body text-center p-4">

                        <div class="fs-1 mb-3">
                            🌐
                        </div>

                        <h5 class="fw-bold">
                            Koneksi
                        </h5>

                        <p class="text-secondary mb-0">
                            Menyediakan solusi koneksi untuk mendukung
                            aktivitas bisnis perusahaan.
                        </p>

                    </div>

                </div>

            </div>


            {{-- SOLUSI DIGITAL --}}
            <div class="col-md-4">

                <div class="card h-100 border-0 shadow-sm">

                    <div class="card-body text-center p-4">

                        <div class="fs-1 mb-3">
                            💡
                        </div>

                        <h5 class="fw-bold">
                            Solusi Digital
                        </h5>

                        <p class="text-secondary mb-0">
                            Membantu perusahaan mendapatkan solusi digital
                            yang sesuai dengan kebutuhan.
                        </p>

                    </div>

                </div>

            </div>


            {{-- PELAYANAN --}}
            <div class="col-md-4">

                <div class="card h-100 border-0 shadow-sm">

                    <div class="card-body text-center p-4">

                        <div class="fs-1 mb-3">
                            🤝
                        </div>

                        <h5 class="fw-bold">
                            Pelayanan
                        </h5>

                        <p class="text-secondary mb-0">
                            Memberikan pelayanan yang mendukung kebutuhan
                            dan perkembangan bisnis.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- JELAJAHI WEBSITE --}}
<section class="bg-light py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Jelajahi Website Kami
            </h2>

            <p class="text-secondary">
                Temukan informasi mengenai perusahaan, layanan,
                artikel, dan kegiatan kami.
            </p>

        </div>


        <div class="row g-4">

            {{-- PROFIL --}}
            <div class="col-md-6 col-lg-3">

                <div class="card h-100 shadow-sm border-0">

                    <div class="card-body text-center p-4">

                        <h5 class="fw-bold">
                            Profil Perusahaan
                        </h5>

                        <p class="text-secondary">
                            Kenali lebih dekat PT Solusi Koneksi Anda.
                        </p>

                        <a
                            href="{{ route('profile') }}"
                            class="btn btn-outline-primary"
                        >
                            Lihat Profil
                        </a>

                    </div>

                </div>

            </div>


            {{-- PRODUK --}}
            <div class="col-md-6 col-lg-3">

                <div class="card h-100 shadow-sm border-0">

                    <div class="card-body text-center p-4">

                        <h5 class="fw-bold">
                            Produk &amp; Layanan
                        </h5>

                        <p class="text-secondary">
                            Lihat produk dan layanan yang tersedia.
                        </p>

                        <a
                            href="{{ route('products.index') }}"
                            class="btn btn-outline-primary"
                        >
                            Lihat Produk
                        </a>

                    </div>

                </div>

            </div>


            {{-- ARTIKEL --}}
            <div class="col-md-6 col-lg-3">

                <div class="card h-100 shadow-sm border-0">

                    <div class="card-body text-center p-4">

                        <h5 class="fw-bold">
                            Artikel
                        </h5>

                        <p class="text-secondary">
                            Baca informasi dan artikel terbaru dari
                            perusahaan.
                        </p>

                        <a
                            href="{{ route('articles.index') }}"
                            class="btn btn-outline-primary"
                        >
                            Lihat Artikel
                        </a>

                    </div>

                </div>

            </div>


            {{-- GALERI --}}
            <div class="col-md-6 col-lg-3">

                <div class="card h-100 shadow-sm border-0">

                    <div class="card-body text-center p-4">

                        <h5 class="fw-bold">
                            Galeri Kegiatan
                        </h5>

                        <p class="text-secondary">
                            Lihat dokumentasi kegiatan perusahaan.
                        </p>

                        <a
                            href="{{ route('gallery.index') }}"
                            class="btn btn-outline-primary"
                        >
                            Lihat Galeri
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- CTA --}}
<section class="py-5">

    <div class="container">

        <div class="bg-primary text-white rounded-4 p-5 text-center">

            <h2 class="fw-bold mb-3">
                Butuh Informasi Lebih Lanjut?
            </h2>

            <p class="mb-4">
                Hubungi PT Solusi Koneksi Anda untuk mendapatkan informasi
                lebih lanjut mengenai produk dan layanan kami.
            </p>

            <a
                href="{{ route('contact') }}"
                class="btn btn-light btn-lg"
            >
                Hubungi Kami
            </a>

        </div>

    </div>

</section>

@endsection