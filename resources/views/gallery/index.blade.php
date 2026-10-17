@extends('layouts.app')

@section('title', 'Galeri Kegiatan - PT Solusi Koneksi Anda')

@section('content')

{{-- HEADER --}}
<section class="bg-light py-5">
    <div class="container text-center">

        <h1 class="fw-bold">
            Galeri Kegiatan
        </h1>

        <p class="text-secondary mb-0">
            Dokumentasi kegiatan PT Solusi Koneksi Anda.
        </p>

    </div>
</section>


{{-- GALERI --}}
<section class="py-5">

    <div class="container">

        @if($galleries->count() > 0)

            <div class="row g-4">

                @foreach($galleries as $gallery)

                    <div class="col-md-6 col-lg-4">

                        <div class="card h-100 border-0 shadow-sm overflow-hidden">

                            {{-- GAMBAR --}}
                            @if($gallery->image)

                                <img
                                    src="{{ asset('storage/' . $gallery->image) }}"
                                    class="card-img-top"
                                    alt="{{ $gallery->title }}"
                                    style="height: 250px; object-fit: cover;"
                                >

                            @else

                                <div
                                    class="bg-light d-flex align-items-center justify-content-center"
                                    style="height: 250px;"
                                >
                                    <span class="text-secondary">
                                        Tidak ada gambar
                                    </span>
                                </div>

                            @endif


                            {{-- INFORMASI GALERI --}}
                            <div class="card-body p-4">

                                <h5 class="fw-bold">
                                    {{ $gallery->title }}
                                </h5>

                                @if($gallery->description)

                                    <p class="text-secondary mb-0">
                                        {{ Str::limit($gallery->description, 120) }}
                                    </p>

                                @else

                                    <p class="text-secondary mb-0">
                                        Dokumentasi kegiatan perusahaan.
                                    </p>

                                @endif

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            {{-- JIKA BELUM ADA GALERI --}}
            <div class="text-center py-5">

                <div class="fs-1 mb-3">
                    🖼️
                </div>

                <h4 class="fw-bold">
                    Belum Ada Galeri
                </h4>

                <p class="text-secondary mb-0">
                    Dokumentasi kegiatan akan ditampilkan di halaman ini.
                </p>

            </div>

        @endif

    </div>

</section>


{{-- CTA --}}
<section class="bg-light py-5">

    <div class="container text-center">

        <h2 class="fw-bold mb-3">
            Ingin Mengetahui Lebih Banyak Tentang Kami?
        </h2>

        <p class="text-secondary mb-4">
            Lihat profil perusahaan atau hubungi kami untuk informasi lebih lanjut.
        </p>

        <a
            href="{{ route('profile') }}"
            class="btn btn-primary btn-lg me-2"
        >
            Profil Perusahaan
        </a>

        <a
            href="{{ route('contact') }}"
            class="btn btn-outline-primary btn-lg"
        >
            Hubungi Kami
        </a>

    </div>

</section>

@endsection