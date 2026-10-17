@extends('layouts.app')

@section('title', 'Artikel - PT Solusi Koneksi Anda')

@section('content')

{{-- HEADER --}}
<section class="bg-light py-5">
    <div class="container text-center">

        <h1 class="fw-bold">
            Artikel & Informasi Terkini
        </h1>

        <p class="text-secondary mb-0">
            Informasi dan berita terbaru dari PT Solusi Koneksi Anda.
        </p>

    </div>
</section>


{{-- DAFTAR ARTIKEL --}}
<section class="py-5">

    <div class="container">

        @if($articles->count() > 0)

            <div class="row g-4">

                @foreach($articles as $article)

                    <div class="col-md-6 col-lg-4">

                        <div class="card h-100 border-0 shadow-sm overflow-hidden">

                            {{-- GAMBAR --}}
                            @if($article->image)

                                <img
                                    src="{{ asset('storage/' . $article->image) }}"
                                    class="card-img-top"
                                    alt="{{ $article->title }}"
                                    style="height: 220px; object-fit: cover;"
                                >

                            @else

                                <div
                                    class="bg-light d-flex align-items-center justify-content-center"
                                    style="height: 220px;"
                                >
                                    <span class="text-secondary">
                                        Tidak ada gambar
                                    </span>
                                </div>

                            @endif


                            {{-- ISI ARTIKEL --}}
                            <div class="card-body p-4">

                                <small class="text-primary">
                                    {{ $article->created_at->format('d M Y') }}
                                </small>

                                <h5 class="card-title fw-bold mt-2">
                                    {{ $article->title }}
                                </h5>

                                <p class="card-text text-secondary">
                                    {{ Str::limit(strip_tags($article->content), 130) }}
                                </p>

                            </div>


                            {{-- FOOTER CARD --}}
                            <div class="card-footer bg-white border-0 px-4 pb-4">

                                <a
                                    href="{{ route('articles.show', $article) }}"
                                    class="btn btn-primary"
                                >
                                    Baca Selengkapnya
                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            {{-- JIKA BELUM ADA ARTIKEL --}}
            <div class="text-center py-5">

                <div class="fs-1 mb-3">
                    📰
                </div>

                <h4 class="fw-bold">
                    Belum Ada Artikel
                </h4>

                <p class="text-secondary mb-0">
                    Artikel dan informasi terbaru akan ditampilkan di halaman ini.
                </p>

            </div>

        @endif

    </div>

</section>


{{-- CTA --}}
<section class="bg-light py-5">

    <div class="container text-center">

        <h2 class="fw-bold mb-3">
            Ingin Mengetahui Lebih Banyak?
        </h2>

        <p class="text-secondary mb-4">
            Hubungi PT Solusi Koneksi Anda untuk mendapatkan informasi lebih lanjut.
        </p>

        <a
            href="{{ route('contact') }}"
            class="btn btn-primary btn-lg"
        >
            Hubungi Kami
        </a>

    </div>

</section>

@endsection