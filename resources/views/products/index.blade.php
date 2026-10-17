@extends('layouts.app')

@section('title', 'Produk & Layanan - PT Solusi Koneksi Anda')

@section('content')

{{-- HEADER --}}
<section class="bg-light py-5">
    <div class="container text-center">

        <h1 class="fw-bold">
            Produk & Layanan
        </h1>

        <p class="text-secondary mb-0">
            Temukan produk dan layanan yang kami sediakan
            untuk mendukung kebutuhan bisnis Anda.
        </p>

    </div>
</section>


{{-- DAFTAR PRODUK --}}
<section class="py-5">

    <div class="container">

        @if($products->count() > 0)

            <div class="row g-4">

                @foreach($products as $product)

                    <div class="col-md-6 col-lg-4">

                        <div class="card h-100 border-0 shadow-sm overflow-hidden">

                            {{-- GAMBAR --}}
                            @if($product->image)

                                <img
                                    src="{{ asset('storage/' . $product->image) }}"
                                    class="card-img-top"
                                    alt="{{ $product->name }}"
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


                            {{-- ISI CARD --}}
                            <div class="card-body p-4">

                                <h5 class="card-title fw-bold">
                                    {{ $product->name }}
                                </h5>

                                <p class="card-text text-secondary">
                                    {{ Str::limit($product->description, 120) }}
                                </p>

                                @if($product->price)
                                    <p class="fw-bold text-primary fs-5 mb-0">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </p>
                                @endif

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            {{-- JIKA BELUM ADA DATA --}}
            <div class="text-center py-5">

                <div class="fs-1 mb-3">
                    📦
                </div>

                <h4 class="fw-bold">
                    Belum Ada Produk
                </h4>

                <p class="text-secondary mb-0">
                    Produk dan layanan akan ditampilkan di halaman ini.
                </p>

            </div>

        @endif

    </div>

</section>


{{-- CTA --}}
<section class="bg-light py-5">

    <div class="container text-center">

        <h2 class="fw-bold mb-3">
            Membutuhkan Informasi Lebih Lanjut?
        </h2>

        <p class="text-secondary mb-4">
            Hubungi kami untuk mengetahui lebih lanjut mengenai
            produk dan layanan yang tersedia.
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