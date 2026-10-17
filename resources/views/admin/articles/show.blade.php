@extends('layouts.admin')

@section('title', 'Detail Artikel - Admin')

@section('page-title', 'Detail Artikel')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Detail Artikel
            </h2>

            <p class="text-muted mb-0">
                Informasi lengkap artikel perusahaan.
            </p>
        </div>

        <a
            href="{{ route('admin.articles.index') }}"
            class="btn btn-outline-secondary"
        >
            ← Kembali
        </a>

    </div>

    {{-- ARTICLE CARD --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            {{-- GAMBAR --}}
            @if ($article->image)

                <div class="mb-4">

                    <img
                        src="{{ asset('storage/' . $article->image) }}"
                        alt="{{ $article->title }}"
                        class="img-fluid rounded"
                        style="
                            width: 100%;
                            max-height: 400px;
                            object-fit: cover;
                        "
                    >

                </div>

            @endif

            {{-- JUDUL --}}
            <h2 class="fw-bold mb-3">
                {{ $article->title }}
            </h2>

            {{-- TANGGAL --}}
            <div class="text-muted mb-4">

                <small>
                    Dipublikasikan:
                    {{ $article->created_at->format('d M Y, H:i') }}
                </small>

            </div>

            {{-- ISI --}}
            <div class="mb-4">

                <h5 class="fw-bold mb-3">
                    Isi Artikel
                </h5>

                <div
                    class="text-muted"
                    style="white-space: pre-line; line-height: 1.8;"
                >
                    {{ $article->content }}
                </div>

            </div>

            {{-- UPDATED --}}
            @if ($article->updated_at != $article->created_at)

                <div class="border-top pt-3 mb-4">

                    <small class="text-muted">
                        Terakhir diperbarui:
                        {{ $article->updated_at->format('d M Y, H:i') }}
                    </small>

                </div>

            @endif

            {{-- BUTTON --}}
            <div class="d-flex gap-2">

                <a
                    href="{{ route('admin.articles.edit', $article) }}"
                    class="btn btn-warning"
                >
                    Edit Artikel
                </a>

                <form
                    action="{{ route('admin.articles.destroy', $article) }}"
                    method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus artikel ini?')"
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

@endsection