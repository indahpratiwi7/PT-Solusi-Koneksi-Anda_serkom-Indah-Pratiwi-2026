@extends('layouts.admin')

@section('title', 'Kelola Galeri - Admin')

@section('page-title', 'Kelola Galeri')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Kelola Galeri
            </h2>

            <p class="text-muted mb-0">
                Tambah, lihat, edit, atau hapus foto kegiatan perusahaan.
            </p>
        </div>

        <a
            href="{{ route('admin.gallery.create') }}"
            class="btn btn-primary"
        >
            + Tambah Foto
        </a>

    </div>

    {{-- SUCCESS MESSAGE --}}
    @if (session('success'))

        <div
            class="alert alert-success alert-dismissible fade show"
            role="alert"
        >
            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>

        </div>

    @endif

    {{-- ERROR MESSAGE --}}
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

    {{-- GALLERY --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            @if ($galleries->count() > 0)

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">

                            <tr>

                                <th class="px-4">
                                    No
                                </th>

                                <th>
                                    Foto
                                </th>

                                <th>
                                    Judul
                                </th>

                                <th>
                                    Deskripsi
                                </th>

                                <th>
                                    Tanggal
                                </th>

                                <th class="text-center">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($galleries as $gallery)

                                <tr>

                                    {{-- NOMOR --}}
                                    <td class="px-4">
                                        {{ $loop->iteration }}
                                    </td>

                                    {{-- FOTO --}}
                                    <td>

                                        @if ($gallery->image)

                                            <img
                                                src="{{ asset('storage/' . $gallery->image) }}"
                                                alt="{{ $gallery->title }}"
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
                                            {{ $gallery->title }}
                                        </div>

                                    </td>

                                    {{-- DESKRIPSI --}}
                                    <td>

                                        @if ($gallery->description)

                                            <small class="text-muted">
                                                {{ Str::limit($gallery->description, 70) }}
                                            </small>

                                        @else

                                            <small class="text-muted">
                                                Tidak ada deskripsi
                                            </small>

                                        @endif

                                    </td>

                                    {{-- TANGGAL --}}
                                    <td>

                                        {{ $gallery->created_at->format('d M Y') }}

                                    </td>

                                    {{-- AKSI --}}
                                    <td>

                                        <div
                                            class="d-flex justify-content-center gap-2"
                                        >

                                            {{-- LIHAT --}}
                                            <a
                                                href="{{ route('admin.gallery.show', $gallery) }}"
                                                class="btn btn-sm btn-outline-primary"
                                            >
                                                Lihat
                                            </a>

                                            {{-- EDIT --}}
                                            <a
                                                href="{{ route('admin.gallery.edit', $gallery) }}"
                                                class="btn btn-sm btn-outline-warning"
                                            >
                                                Edit
                                            </a>

                                            {{-- HAPUS --}}
                                            <form
                                                action="{{ route('admin.gallery.destroy', $gallery) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus foto ini?')"
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
                            🖼️
                        </span>
                    </div>

                    <h5 class="fw-bold">
                        Belum Ada Foto
                    </h5>

                    <p class="text-muted">
                        Belum ada foto kegiatan yang ditambahkan.
                    </p>

                    <a
                        href="{{ route('admin.gallery.create') }}"
                        class="btn btn-primary"
                    >
                        + Tambah Foto
                    </a>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection