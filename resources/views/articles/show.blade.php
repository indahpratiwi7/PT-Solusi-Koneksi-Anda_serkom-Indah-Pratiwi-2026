@extends('layouts.app')

@section('title', $article->title)

@section('content')

<div class="container py-5">

    {{-- Tombol kembali --}}
    <div class="mb-4">
        <a href="{{ route('articles.index') }}" class="text-decoration-none">
            ← Kembali ke Artikel
        </a>
    </div>

    {{-- Detail artikel --}}
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4 p-md-5">

            {{-- Gambar --}}
            @if ($article->image)
                <img
                    src="{{ asset('storage/' . $article->image) }}"
                    alt="{{ $article->title }}"
                    class="img-fluid rounded mb-4"
                    style="width: 100%; max-height: 450px; object-fit: cover;"
                >
            @endif

            {{-- Label --}}
            <span class="badge bg-primary mb-3">
                Artikel / Informasi Terkini
            </span>

            {{-- Judul --}}
            <h1 class="fw-bold mb-2">
                {{ $article->title }}
            </h1>

            {{-- Tanggal --}}
            <p class="text-muted mb-4">
                {{ $article->created_at->format('d M Y, H:i') }}
            </p>

            {{-- Isi artikel --}}
            <div
                class="text-muted"
                style="white-space: pre-line; line-height: 1.9;"
            >
                {{ $article->content }}
            </div>

        </div>
    </div>

</div>

@endsection