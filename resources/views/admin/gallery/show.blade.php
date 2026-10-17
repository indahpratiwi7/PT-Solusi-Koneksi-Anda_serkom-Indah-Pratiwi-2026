@extends('layouts.admin')

@section('title', 'Detail Foto Galeri - Admin')

@section('page-title', 'Detail Foto Galeri')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Detail Foto Galeri
            </h2>

            <p class="text-muted mb-0">
                Informasi lengkap foto kegiatan perusahaan.
            </p>
        </div>

        <a
            href="{{ route('admin.gallery.index') }}"
            class="btn btn-outline-secondary"
        >
            ← Kembali
        </a>

    </div>

    {{-- DETAIL CARD --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <div class="row g-4">

                {{-- FOTO --}}
                <div class="col-md-6">

                    @if ($gallery->image)

                        <img
                            src="{{ asset('storage/' . $gallery->image) }}"
                            alt="{{ $gallery->title }}"
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
                                Tidak ada foto
                            </span>
                        </div>

                    @endif

                </div>

                {{-- INFORMASI --}}
                <div class="col-md-6">

                    {{-- JUDUL --}}
                    <h3 class="fw-bold mb-3">
                        {{ $gallery->title }}
                    </h3>

                    {{-- DESKRIPSI --}}
                    <div class="mb-4">

                        <h6 class="fw-bold">
                            Deskripsi
                        </h6>

                        @if ($gallery->description)

                            <p
                                class="text-muted"
                                style="white-space: pre-line; line-height: 1.7;"
                            >
                                {{ $gallery->description }}
                            </p>

                        @else

                            <p class="text-muted">
                                Tidak ada deskripsi.
                            </p>

                        @endif

                    </div>

                    {{-- TANGGAL DITAMBAHKAN --}}
                    <div class="mb-4">

                        <small class="text-muted d-block">
                            Ditambahkan
                        </small>

                        <span>
                            {{ $gallery->created_at->format('d M Y, H:i') }}
                        </span>

                    </div>

                    {{-- TERAKHIR DIPERBARUI --}}
                    @if ($gallery->updated_at != $gallery->created_at)

                        <div class="mb-4">

                            <small class="text-muted d-block">
                                Terakhir diperbarui
                            </small>

                            <span>
                                {{ $gallery->updated_at->format('d M Y, H:i') }}
                            </span>

                        </div>

                    @endif

                    {{-- BUTTON --}}
                    <div class="d-flex gap-2">

                        <a
                            href="{{ route('admin.gallery.edit', $gallery) }}"
                            class="btn btn-warning"
                        >
                            Edit Foto
                        </a>

                        <form
                            action="{{ route('admin.gallery.destroy', $gallery) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus foto ini?')"
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