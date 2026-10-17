@extends('layouts.admin')

@section('title', 'Detail Produk - Admin')

@section('page-title', 'Detail Produk')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Detail Produk
            </h2>

            <p class="text-muted mb-0">
                Informasi lengkap produk atau layanan perusahaan.
            </p>
        </div>

        <a href="{{ route('admin.products.index') }}"
           class="btn btn-outline-secondary">
            ← Kembali
        </a>

    </div>

    {{-- DETAIL CARD --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <div class="row g-4">

                {{-- GAMBAR --}}
                <div class="col-md-5">

                    @if ($product->image)

                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            class="img-fluid rounded"
                            style="
                                width: 100%;
                                max-height: 350px;
                                object-fit: cover;
                            "
                        >

                    @else

                        <div
                            class="bg-light rounded d-flex align-items-center justify-content-center"
                            style="height: 300px;"
                        >
                            <span class="text-muted">
                                Tidak ada gambar
                            </span>
                        </div>

                    @endif

                </div>

                {{-- INFORMASI --}}
                <div class="col-md-7">

                    <h3 class="fw-bold mb-3">
                        {{ $product->name }}
                    </h3>

                    {{-- HARGA --}}
                    <div class="mb-4">

                        <small class="text-muted d-block mb-1">
                            Harga
                        </small>

                        @if ($product->price !== null)

                            <h4 class="text-primary fw-bold">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </h4>

                        @else

                            <span class="text-muted">
                                Harga tidak tersedia
                            </span>

                        @endif

                    </div>

                    {{-- DESKRIPSI --}}
                    <div class="mb-4">

                        <h6 class="fw-bold">
                            Deskripsi
                        </h6>

                        <p class="text-muted" style="white-space: pre-line;">
                            {{ $product->description }}
                        </p>

                    </div>

                    {{-- TANGGAL --}}
                    <div class="mb-4">

                        <small class="text-muted d-block">
                            Ditambahkan
                        </small>

                        <span>
                            {{ $product->created_at->format('d M Y, H:i') }}
                        </span>

                    </div>

                    {{-- BUTTON --}}
                    <div class="d-flex gap-2">

                        <a
                            href="{{ route('admin.products.edit', $product) }}"
                            class="btn btn-warning"
                        >
                            Edit Produk
                        </a>

                        <form
                            action="{{ route('admin.products.destroy', $product) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus produk ini?')"
                            class="m-0"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger"
                            >
                                Hapus
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection