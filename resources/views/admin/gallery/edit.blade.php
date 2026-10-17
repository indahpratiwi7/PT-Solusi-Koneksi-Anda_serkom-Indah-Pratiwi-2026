@extends('layouts.admin')

@section('title', 'Edit Foto Galeri - Admin')

@section('page-title', 'Edit Foto Galeri')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Edit Foto Galeri
            </h2>

            <p class="text-muted mb-0">
                Perbarui informasi foto kegiatan perusahaan.
            </p>
        </div>

        <a
            href="{{ route('admin.gallery.index') }}"
            class="btn btn-outline-secondary"
        >
            ← Kembali
        </a>

    </div>

    {{-- SUCCESS --}}
    @if (session('success'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>

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
                action="{{ route('admin.gallery.update', $gallery) }}"
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
                        Judul Foto
                    </label>

                    <input
                        type="text"
                        name="title"
                        id="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $gallery->title) }}"
                        placeholder="Masukkan judul foto"
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
                    >{{ old('description', $gallery->description) }}</textarea>

                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- FOTO LAMA --}}
                @if ($gallery->image)

                    <div class="mb-4">

                        <label class="form-label fw-semibold d-block">
                            Foto Saat Ini
                        </label>

                        <img
                            src="{{ asset('storage/' . $gallery->image) }}"
                            alt="{{ $gallery->title }}"
                            class="img-thumbnail"
                            style="
                                width: 240px;
                                height: 160px;
                                object-fit: cover;
                            "
                        >

                    </div>

                @endif

                {{-- FOTO BARU --}}
                <div class="mb-4">

                    <label
                        for="image"
                        class="form-label fw-semibold"
                    >
                        Ganti Foto
                    </label>

                    <input
                        type="file"
                        name="image"
                        id="image"
                        class="form-control @error('image') is-invalid @enderror"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    <div class="form-text">
                        Kosongkan jika tidak ingin mengganti foto.
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
                        Update Foto
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection