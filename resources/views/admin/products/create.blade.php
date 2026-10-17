@extends('layouts.admin')

@section('title', 'Tambah Produk - Admin')

@section('page-title', 'Tambah Produk')

@section('content')

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

        <div>
            <h1 class="admin-page-title mb-1">
                Tambah Produk
            </h1>

            <p class="admin-page-description mb-0">
                Tambahkan produk atau layanan perusahaan.
            </p>
        </div>

        <a
            href="{{ route('admin.products.index') }}"
            class="btn btn-outline-secondary"
        >
            ← Kembali
        </a>

    </div>


    {{-- ERROR VALIDATION --}}
    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Terjadi kesalahan!</strong>

            <ul class="mb-0 mt-2">

                @foreach ($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- FORM --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form
                action="{{ route('admin.products.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf


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
                        value="{{ old('name') }}"
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
                    >{{ old('description') }}</textarea>

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
                        value="{{ old('price') }}"
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


                {{-- GAMBAR --}}
                <div class="mb-4">

                    <label
                        for="image"
                        class="form-label fw-semibold"
                    >
                        Gambar Produk
                    </label>

                    <input
                        type="file"
                        name="image"
                        id="image"
                        class="form-control @error('image') is-invalid @enderror"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    <div class="form-text">
                        Format: JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
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
                        Simpan Produk
                    </button>

                </div>

            </form>

        </div>

    </div>

@endsection