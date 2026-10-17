@extends('layouts.admin')

@section('title', 'Tambah Foto Galeri - Admin')

@section('page-title', 'Tambah Foto Galeri')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Tambah Foto Galeri
            </h2>

            <p class="text-muted mb-0">
                Tambahkan dokumentasi kegiatan perusahaan ke galeri.
            </p>
        </div>

        <a
            href="{{ route('admin.gallery.index') }}"
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
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif

    {{-- FORM --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form
                action="{{ route('admin.gallery.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                {{-- JUDUL --}}
                <div class="mb-4">

                    <label
                        for="title"
                        class="form-label fw-semibold"
                    >
                        Judul Foto
                    </label>

                    <input
                        type="text"
                        name="title"
                        id="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}"
                        placeholder="Contoh: Kegiatan Rapat Perusahaan"
                        required
                    >

                    @error('title')
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
                        rows="5"
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Masukkan deskripsi foto (opsional)..."
                    >{{ old('description') }}</textarea>

                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- FOTO --}}
                <div class="mb-4">

                    <label
                        for="image"
                        class="form-label fw-semibold"
                    >
                        Foto Galeri
                    </label>

                    <input
                        type="file"
                        name="image"
                        id="image"
                        class="form-control @error('image') is-invalid @enderror"
                        accept=".jpg,.jpeg,.png,.webp"
                        required
                    >

                    <div class="form-text">
                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 10 MB.
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
                        href="{{ route('admin.gallery.index') }}"
                        class="btn btn-secondary"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Simpan Foto
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection