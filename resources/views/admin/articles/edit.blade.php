@extends('layouts.admin')

@section('title', 'Edit Artikel - Admin')

@section('page-title', 'Edit Artikel')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Edit Artikel
            </h2>

            <p class="text-muted mb-0">
                Perbarui informasi artikel perusahaan.
            </p>
        </div>

        <a href="{{ route('admin.articles.index') }}"
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
                action="{{ route('admin.articles.update', $article) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')

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
                        value="{{ old('title', $article->title) }}"
                        placeholder="Masukkan judul artikel"
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
                        placeholder="Tulis isi artikel..."
                        required
                    >{{ old('content', $article->content) }}</textarea>

                    @error('content')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- GAMBAR LAMA --}}
                @if ($article->image)

                    <div class="mb-4">

                        <label class="form-label fw-semibold d-block">
                            Gambar Saat Ini
                        </label>

                        <img
                            src="{{ asset('storage/' . $article->image) }}"
                            alt="{{ $article->title }}"
                            class="img-thumbnail"
                            style="
                                width: 220px;
                                height: 150px;
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
                        href="{{ route('admin.articles.index') }}"
                        class="btn btn-secondary"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Update Artikel
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection