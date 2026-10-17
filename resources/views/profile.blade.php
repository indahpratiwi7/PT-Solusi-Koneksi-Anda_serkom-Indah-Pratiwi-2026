@extends('layouts.app')

@section('title', 'Profil Perusahaan - PT Solusi Koneksi Anda')

@section('content')

{{-- JUDUL HALAMAN --}}
<section class="bg-light py-5">
    <div class="container text-center">
        <h1 class="fw-bold">Profil Perusahaan</h1>
        <p class="text-secondary mb-0">
            Mengenal lebih dekat PT Solusi Koneksi Anda
        </p>
    </div>
</section>

{{-- SAMBUTAN DIREKTUR --}}
<section class="py-4 py-lg-5">
    <div class="container">

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-body p-4 p-lg-5">

                <div class="row align-items-center g-4 g-lg-5">

                    {{-- FOTO DIREKTUR --}}
                    <div class="col-lg-4 text-center">
                        <img
                            src="{{ asset('images/direktur.png') }}"
                            alt="Foto Direktur PT Solusi Koneksi Anda"
                            class="img-fluid rounded-4 shadow-sm"
                            style="width: 100%; max-width: 320px;
                                   height: 350px; object-fit: cover;"
                        >
                    </div>

                    {{-- INFORMASI DIREKTUR --}}
                    <div class="col-lg-8">

                        <h4 class="fw-bold text-primary mb-2">
                            Sambutan Direktur
                        </h4>

                        <h3 class="fw-bold mb-1">
                            Daniel William Anderson
                        </h3>

                        <p class="text-primary mb-3">
                            Direktur Utama
                        </p>

                        <div
                            class="bg-primary rounded-pill mb-4"
                            style="width: 55px; height: 4px;"
                        ></div>

                        <p class="text-secondary">
                            Selamat datang di PT Solusi Koneksi Anda.
                            Kami berkomitmen untuk menghadirkan solusi
                            koneksi dan layanan digital yang berkualitas,
                            andal, dan inovatif guna mendukung kebutuhan
                            pelanggan.
                        </p>

                        <p class="text-secondary">
                            Kepercayaan pelanggan merupakan motivasi bagi
                            kami untuk terus meningkatkan kualitas layanan,
                            memberikan solusi terbaik, dan membangun
                            hubungan kerja sama yang berkelanjutan.
                        </p>

                        <p class="text-secondary mb-0">
                            Terima kasih atas kepercayaan Anda kepada
                            PT Solusi Koneksi Anda.
                        </p>

                    </div>

                </div>

            </div>
        </div>

    </div>
</section>

{{-- PROFIL PERUSAHAAN --}}
<section class="py-4 py-lg-5">
    <div class="container">

        <div class="row align-items-center g-4">

            <div class="col-lg-6">
                <h2 class="fw-bold mb-3">
                    PT Solusi Koneksi Anda
                </h2>

                <p class="text-secondary">
                    PT Solusi Koneksi Anda merupakan perusahaan yang
                    menyediakan berbagai solusi koneksi dan layanan
                    digital untuk membantu memenuhi kebutuhan perusahaan
                    dan bisnis.
                </p>

                <p class="text-secondary mb-0">
                    Kami berkomitmen memberikan produk dan layanan yang
                    dapat mendukung aktivitas bisnis serta membantu
                    perusahaan berkembang melalui pemanfaatan teknologi.
                </p>
            </div>

            <div class="col-lg-6">
                <div class="bg-primary text-white rounded-4 p-4 p-lg-5 shadow-sm">

                    <h3 class="fw-bold mb-3">
                        Solusi untuk Bisnis Anda
                    </h3>

                    <p class="mb-0">
                        Kami hadir sebagai partner dalam menyediakan
                        koneksi dan solusi digital yang sesuai dengan
                        kebutuhan bisnis.
                    </p>

                </div>
            </div>

        </div>

    </div>
</section>

{{-- VISI DAN MISI --}}
<section class="bg-light py-5">
    <div class="container">

        <div class="row g-4">

            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">

                        <h3 class="fw-bold text-primary mb-3">Visi</h3>

                        <p class="text-secondary mb-0">
                            Menjadi perusahaan yang terpercaya dalam
                            menyediakan solusi koneksi dan layanan
                            digital bagi kebutuhan bisnis dan perusahaan.
                        </p>

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">

                        <h3 class="fw-bold text-primary mb-3">Misi</h3>

                        <ul class="text-secondary mb-0">
                            <li class="mb-2">
                                Menyediakan produk dan layanan yang berkualitas.
                            </li>
                            <li class="mb-2">
                                Memberikan solusi sesuai kebutuhan pelanggan.
                            </li>
                            <li class="mb-2">
                                Meningkatkan kualitas pelayanan kepada pelanggan.
                            </li>
                            <li>
                                Mendukung perkembangan bisnis melalui teknologi.
                            </li>
                        </ul>

                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

{{-- NILAI PERUSAHAAN --}}
<section class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Nilai Perusahaan</h2>
            <p class="text-secondary">
                Prinsip yang kami terapkan dalam memberikan pelayanan.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 text-center">
                    <div class="card-body p-4">
                        <div class="fs-1 mb-3">⭐</div>
                        <h5 class="fw-bold">Profesional</h5>
                        <p class="text-secondary mb-0">
                            Bekerja secara profesional dan bertanggung
                            jawab dalam memberikan layanan.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 text-center">
                    <div class="card-body p-4">
                        <div class="fs-1 mb-3">🤝</div>
                        <h5 class="fw-bold">Terpercaya</h5>
                        <p class="text-secondary mb-0">
                            Membangun hubungan yang baik dan terpercaya
                            dengan pelanggan.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 text-center">
                    <div class="card-body p-4">
                        <div class="fs-1 mb-3">💡</div>
                        <h5 class="fw-bold">Inovatif</h5>
                        <p class="text-secondary mb-0">
                            Terus mengembangkan solusi dan layanan sesuai
                            perkembangan teknologi.
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

{{-- TOMBOL PRODUK --}}
<section class="py-5 bg-light">
    <div class="container text-center">

        <h2 class="fw-bold mb-3">
            Ingin Mengetahui Produk dan Layanan Kami?
        </h2>

        <p class="text-secondary mb-4">
            Lihat berbagai produk dan layanan yang kami sediakan.
        </p>

        <a href="{{ route('products.index') }}"
           class="btn btn-primary btn-lg">
            Lihat Produk &amp; Layanan
        </a>

    </div>
</section>

@endsection