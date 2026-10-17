@extends('layouts.app')

@section('title', $product->name)

@section('content')

<div class="container py-5">

    {{-- HEADER --}}
    <div class="mb-4">
        <a
            href="{{ route('products.index') }}"
            class="text-decoration-none"
        >
            ← Kembali ke Produk
        </a>
    </div>

    {{-- DETAIL PRODUK --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4 p-md-5">

            <div class="row g-5 align-items-center">

                {{-- GAMBAR --}}
                <div class="col-md-6">

                    @if ($product->image)

                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            class="img-fluid rounded"
                            style="
                                width: 100%;
                                max-height: 450px;
                                object-fit: cover;
                            "
                        >

                    @else

                        <div
                            class="bg-light rounded d-flex align-items-center justify-content-center"
                            style="height: 350px;"
                        >
                            <span class="text-muted">
                                Tidak ada gambar
                            </span>
                        </div>

                    @endif

                </div>

                {{-- INFORMASI PRODUK --}}
                <div class="col-md-6">

                    <span class="badge bg-primary mb-3">
                        Produk / Layanan
                    </span>

                    <h1 class="fw-bold mb-3">
                        {{ $product->name }}
                    </h1>

                    {{-- HARGA --}}
                    @if ($product->price !== null)

                        <h3 class="text-primary fw-bold mb-4">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </h3>

                    @endif

                    {{-- DESKRIPSI --}}
                    <div class="mb-4">

                        <h5 class="fw-bold mb-2">
                            Deskripsi
                        </h5>

                        <p
                            class="text-muted"
                            style="
                                white-space: pre-line;
                                line-height: 1.8;
                            "
                        >
                            {{ $product->description }}
                        </p>

                    </div>

                    {{-- TOMBOL KONTAK --}}
                    <a
                        href="{{ route('contact') }}"
                        class="btn btn-primary"
                    >
                        Hubungi Kami
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection