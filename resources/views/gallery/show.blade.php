@extends('layouts.app')

@section('title', $gallery->title)

@section('content')

<div class="container py-5">

    {{-- Tombol kembali --}}
    <div class="mb-4">
        <a href="{{ route('gallery.index') }}" class="text-decoration-none">
            ← Kembali ke Galeri
        </a>
    </div>

    {{-- Detail galeri --}}
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4 p-md-5">

            {{-- Gambar --}}
            @if ($gallery->image)
                <img
                    src="{{ asset('storage/' . $gallery->image) }}"
                    alt="{{ $gallery->title }}"
                    class="img-fluid rounded mb-4"
                    style="width: 100%; max-height: 550px; object-fit: cover;"
                >
            @endif

            {{-- Label --}}
            <span class="badge bg-primary mb-3">
                Galeri Kegiatan
            </span>

            {{-- Judul --}}
            <h1 class="fw-bold mb-2">
                {{ $gallery->title }}
            </h1>

            {{-- Tanggal --}}
            <p class="text-muted mb-4">
                {{ $gallery->created_at->format('d M Y, H:i') }}
            </p>

            {{-- Deskripsi --}}
            @if ($gallery->description)
                <div
                    class="text-muted"
                    style="white-space: pre-line; line-height: 1.9;"
                >
                    {{ $gallery->description }}
                </div>
            @else
                <p class="text-muted">
                    Tidak ada deskripsi untuk foto ini.
                </p>
            @endif

        </div>
    </div>

</div>

@endsection