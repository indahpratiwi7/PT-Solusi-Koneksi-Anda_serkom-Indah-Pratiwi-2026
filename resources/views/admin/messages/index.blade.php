@extends('layouts.admin')

@section('title', 'Pesan Masuk - Admin')

@section('page-title', 'Pesan Masuk')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Pesan Masuk
        </h2>

        <p class="text-muted mb-0">
            Lihat pesan yang dikirim melalui halaman kontak.
        </p>

    </div>

    {{-- SUCCESS --}}
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

    {{-- TABLE --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            @if ($messages->count() > 0)

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">

                            <tr>

                                <th class="px-4">
                                    No
                                </th>

                                <th>
                                    Nama
                                </th>

                                <th>
                                    Email
                                </th>

                                <th>
                                    Telepon
                                </th>

                                <th>
                                    Pesan
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

                            @foreach ($messages as $message)

                                <tr>

                                    {{-- NOMOR --}}
                                    <td class="px-4">
                                        {{ $loop->iteration }}
                                    </td>

                                    {{-- NAMA --}}
                                    <td>
                                        <div class="fw-semibold">
                                            {{ $message->name }}
                                        </div>
                                    </td>

                                    {{-- EMAIL --}}
                                    <td>
                                        {{ $message->email }}
                                    </td>

                                    {{-- TELEPON --}}
                                    <td>

                                        @if ($message->phone)

                                            {{ $message->phone }}

                                        @else

                                            <span class="text-muted">
                                                -
                                            </span>

                                        @endif

                                    </td>

                                    {{-- PESAN --}}
                                    <td>

                                        <span class="text-muted">
                                            {{ Str::limit($message->message, 60) }}
                                        </span>

                                    </td>

                                    {{-- TANGGAL --}}
                                    <td>
                                        {{ $message->created_at->format('d M Y') }}
                                    </td>

                                    {{-- AKSI --}}
                                    <td>

                                        <div
                                            class="d-flex justify-content-center gap-2"
                                        >

                                            {{-- LIHAT --}}
                                            <a
                                                href="{{ route('admin.messages.show', $message) }}"
                                                class="btn btn-sm btn-outline-primary"
                                            >
                                                Lihat
                                            </a>

                                            {{-- HAPUS --}}
                                            <form
                                                action="{{ route('admin.messages.destroy', $message) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus pesan ini?')"
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
                            💬
                        </span>
                    </div>

                    <h5 class="fw-bold">
                        Belum Ada Pesan
                    </h5>

                    <p class="text-muted mb-0">
                        Belum ada pesan yang masuk dari halaman kontak.
                    </p>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection