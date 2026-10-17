@extends('layouts.admin')

@section('title', 'Tambah Artikel - Admin')

@section('page-title', 'Tambah Artikel')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Tambah Artikel
            </h2>

            <p class="text-muted mb-0">
                Tambahkan artikel atau informasi terbaru perusahaan.
            </p>
        </div>

        <a href="{{ route('admin.articles.index') }}"
           class="btn btn-outline-secondary">
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
                action="{{ route('admin.articles.store') }}"
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
                        Judul Artikel
                    </label>

                    <input
                        type="text"
                        name="title"
                        id="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}"
                        placeholder="Contoh: PT Solusi Koneksi Anda Hadirkan Layanan Digital Terbaru"
                        required
                    >

                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- ISI ARTIKEL --}}
                <div class="mb-4">

                    <label
                        for="content"
                        class="form-label fw-semibold"
                    >
                        Isi Artikel
                    </label>

                    <textarea
                        name="content"
                        id="content"
                        rows="10"
                        class="form-control @error('content') is-invalid @enderror"
                        placeholder="Tulis isi artikel di sini..."
                        required
                    >{{ old('content') }}</textarea>

                    @error('content')
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
                        Gambar Artikel
                    </label>

                    <input
                        type="file"
                        name="image"
                        id="image"
                        class="form-control @error('image') is-invalid @enderror"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    <div class="form-text">
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
                        href="{{ route('admin.articles.index') }}"
                        class="btn btn-secondary"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Simpan Artikel
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection