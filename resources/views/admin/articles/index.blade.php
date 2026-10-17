@extends('layouts.admin')

@section('title', 'Kelola Artikel - Admin')

@section('page-title', 'Kelola Artikel')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Kelola Artikel
            </h2>

            <p class="text-muted mb-0">
                Tambah, lihat, edit, atau hapus artikel perusahaan.
            </p>
        </div>

        <a href="{{ route('admin.articles.create') }}"
           class="btn btn-primary">
            + Tambah Artikel
        </a>

    </div>

    {{-- SUCCESS MESSAGE --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>
    @endif

    {{-- ERROR MESSAGE --}}
    @if ($errors->any())
        <div class="alert alert-danger">

            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif

    {{-- ARTICLE TABLE --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            @if ($articles->count() > 0)

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">

                            <tr>
                                <th class="px-4">No</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th class="text-center">Aksi</th>
                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($articles as $article)

                                <tr>

                                    {{-- NOMOR --}}
                                    <td class="px-4">
                                        {{ $loop->iteration }}
                                    </td>

                                    {{-- GAMBAR --}}
                                    <td>

                                        @if ($article->image)

                                            <img
                                                src="{{ asset('storage/' . $article->image) }}"
                                                alt="{{ $article->title }}"
                                                style="
                                                    width: 90px;
                                                    height: 65px;
                                                    object-fit: cover;
                                                "
                                                class="rounded"
                                            >

                                        @else

                                            <div
                                                class="bg-light rounded d-flex align-items-center justify-content-center"
                                                style="
                                                    width: 90px;
                                                    height: 65px;
                                                "
                                            >
                                                <small class="text-muted">
                                                    Tidak ada
                                                </small>
                                            </div>

                                        @endif

                                    </td>

                                    {{-- JUDUL --}}
                                    <td>

                                        <div class="fw-semibold">
                                            {{ $article->title }}
                                        </div>

                                        <small class="text-muted">
                                            {{ Str::limit(strip_tags($article->content), 70) }}
                                        </small>

                                    </td>

                                    {{-- TANGGAL --}}
                                    <td>
                                        {{ $article->created_at->format('d M Y') }}
                                    </td>

                                    {{-- AKSI --}}
                                    <td>

                                        <div class="d-flex justify-content-center gap-2">

                                            {{-- LIHAT --}}
                                            <a
                                                href="{{ route('admin.articles.show', $article) }}"
                                                class="btn btn-sm btn-outline-primary"
                                            >
                                                Lihat
                                            </a>

                                            {{-- EDIT --}}
                                            <a
                                                href="{{ route('admin.articles.edit', $article) }}"
                                                class="btn btn-sm btn-outline-warning"
                                            >
                                                Edit
                                            </a>

                                            {{-- HAPUS --}}
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
                                                    class="btn btn-sm btn-outline-danger"
                                                >
                                                    Hapus
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                {{-- EMPTY STATE --}}
                <div class="text-center py-5">

                    <div class="mb-3">
                        <span style="font-size: 50px;">
                            📰
                        </span>
                    </div>

                    <h5 class="fw-bold">
                        Belum Ada Artikel
                    </h5>

                    <p class="text-muted">
                        Belum ada artikel yang ditambahkan.
                    </p>

                    <a
                        href="{{ route('admin.articles.create') }}"
                        class="btn btn-primary"
                    >
                        + Tambah Artikel
                    </a>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection