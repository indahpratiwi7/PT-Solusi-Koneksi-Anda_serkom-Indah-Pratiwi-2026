@extends('layouts.admin')

@section('title', 'Kelola Produk & Layanan')

@section('page-title', 'Kelola Produk & Layanan')

@section('content')

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

        <div>
            <h1 class="admin-page-title mb-1">
                Kelola Produk & Layanan
            </h1>

            <p class="admin-page-description mb-0">
                Tambah, ubah, lihat, dan hapus produk atau layanan perusahaan.
            </p>
        </div>

        <a
            href="{{ route('admin.products.create') }}"
            class="btn btn-primary"
        >
            + Tambah Produk
        </a>

    </div>


    {{-- PESAN SUKSES --}}
    @if(session('success'))

        <div
            class="alert alert-success alert-dismissible fade show"
            role="alert"
        >
            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>
        </div>

    @endif


    {{-- CARD TABEL --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            @if($products->count() > 0)

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">

                            <tr>

                                <th class="px-4">
                                    No
                                </th>

                                <th>
                                    Gambar
                                </th>

                                <th>
                                    Nama Produk
                                </th>

                                <th>
                                    Harga
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

                            @foreach($products as $product)

                                <tr>

                                    {{-- NOMOR --}}
                                    <td class="px-4">
                                        {{ $loop->iteration }}
                                    </td>


                                    {{-- GAMBAR --}}
                                    <td>

                                        @if($product->image)

                                            <img
                                                src="{{ asset('storage/' . $product->image) }}"
                                                alt="{{ $product->name }}"
                                                width="70"
                                                height="55"
                                                class="rounded"
                                                style="object-fit: cover;"
                                            >

                                        @else

                                            <div
                                                class="bg-light rounded d-flex align-items-center justify-content-center"
                                                style="width: 70px; height: 55px;"
                                            >
                                                -
                                            </div>

                                        @endif

                                    </td>


                                    {{-- NAMA --}}
                                    <td>

                                        <strong>
                                            {{ $product->name }}
                                        </strong>

                                        @if($product->description)

                                            <br>

                                            <small class="text-secondary">
                                                {{ Str::limit($product->description, 60) }}
                                            </small>

                                        @endif

                                    </td>


                                    {{-- HARGA --}}
                                    <td>

                                        @if($product->price)

                                            <span class="fw-semibold">
                                                Rp {{ number_format($product->price, 0, ',', '.') }}
                                            </span>

                                        @else

                                            <span class="text-secondary">
                                                -
                                            </span>

                                        @endif

                                    </td>


                                    {{-- TANGGAL --}}
                                    <td>

                                        <span class="text-secondary">
                                            {{ $product->created_at->format('d/m/Y') }}
                                        </span>

                                    </td>


                                    {{-- AKSI --}}
                                    <td>

                                        <div class="d-flex justify-content-center gap-2 flex-wrap">

                                            {{-- LIHAT --}}
                                            <a
                                                href="{{ route('admin.products.show', $product) }}"
                                                class="btn btn-sm btn-outline-info"
                                            >
                                                Lihat
                                            </a>


                                            {{-- EDIT --}}
                                            <a
                                                href="{{ route('admin.products.edit', $product) }}"
                                                class="btn btn-sm btn-outline-warning"
                                            >
                                                Edit
                                            </a>


                                            {{-- HAPUS --}}
                                            <form
                                                action="{{ route('admin.products.destroy', $product) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus produk ini?')"
                                                class="d-inline"
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

                {{-- BELUM ADA PRODUK --}}
                <div class="text-center py-5 px-4">

                    <div class="fs-1 mb-3">
                        📦
                    </div>

                    <h4 class="fw-bold">
                        Belum Ada Produk
                    </h4>

                    <p class="text-secondary mb-4">
                        Belum ada produk atau layanan yang ditambahkan.
                    </p>

                    <a
                        href="{{ route('admin.products.create') }}"
                        class="btn btn-primary"
                    >
                        + Tambah Produk Pertama
                    </a>

                </div>

            @endif

        </div>

    </div>

@endsection