@extends('layouts.admin')

@section('title', 'Edit Produk - Admin')

@section('page-title', 'Edit Produk')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Edit Produk
            </h2>

            <p class="text-muted mb-0">
                Perbarui informasi produk atau layanan perusahaan.
            </p>
        </div>

        <a href="{{ route('admin.products.index') }}"
           class="btn btn-outline-secondary">
            ← Kembali
        </a>

    </div>

    {{-- SUCCESS --}}
    @if (session('success'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif

    {{-- ERROR VALIDATION --}}
    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Terjadi kesalahan!</strong>

            <ul class="mb-0 mt-2">

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif

    {{-- FORM --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form
                action="{{ route('admin.products.update', $product) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')

                {{-- NAMA PRODUK --}}
                <div class="mb-4">

                    <label
                        for="name"
                        class="form-label fw-semibold"
                    >
                        Nama Produk / Layanan
                    </label>

                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $product->name) }}"
                        placeholder="Contoh: Website Company Profile"
                        required
                    >

                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- DESKRIPSI --}}
                <div class="mb-4">

                    <label
                        for="description"
                        class="form-label fw-semibold"
                    >
                        Deskripsi
                    </label>

                    <textarea
                        name="description"
                        id="description"
                        rows="6"
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Masukkan deskripsi produk atau layanan..."
                        required
                    >{{ old('description', $product->description) }}</textarea>

                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- HARGA --}}
                <div class="mb-4">

                    <label
                        for="price"
                        class="form-label fw-semibold"
                    >
                        Harga
                    </label>

                    <input
                        type="number"
                        name="price"
                        id="price"
                        class="form-control @error('price') is-invalid @enderror"
                        value="{{ old('price', $product->price) }}"
                        placeholder="Contoh: 3000000"
                        min="0"
                        step="0.01"
                    >

                    <div class="form-text">
                        Kosongkan jika harga tidak ingin ditampilkan.
                    </div>

                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- GAMBAR LAMA --}}
                @if ($product->image)

                    <div class="mb-4">

                        <label class="form-label fw-semibold d-block">
                            Gambar Saat Ini
                        </label>

                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            class="img-thumbnail"
                            style="
                                width: 200px;
                                height: 140px;
                                object-fit: cover;
                            "
                        >

                    </div>

                @endif

                {{-- GAMBAR BARU --}}
                <div class="mb-4">

                    <label
                        for="image"
                        class="form-label fw-semibold"
                    >
                        Ganti Gambar
                    </label>

                    <input
                        type="file"
                        name="image"
                        id="image"
                        class="form-control @error('image') is-invalid @enderror"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    <div class="form-text">
                        Kosongkan jika tidak ingin mengganti gambar.
                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </div>

                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- BUTTON --}}
                <div class="d-flex gap-2">

                    <a
                        href="{{ route('admin.products.index') }}"
                        class="btn btn-secondary"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Update Produk
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection