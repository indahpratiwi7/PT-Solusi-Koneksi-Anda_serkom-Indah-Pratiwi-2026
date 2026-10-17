@extends('layouts.admin')

@section('title', 'Detail Pesan - Admin')

@section('page-title', 'Detail Pesan')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Detail Pesan
            </h2>

            <p class="text-muted mb-0">
                Lihat isi lengkap pesan dari pengunjung.
            </p>
        </div>

        <a
            href="{{ route('admin.messages.index') }}"
            class="btn btn-outline-secondary"
        >
            ← Kembali
        </a>

    </div>

    {{-- DETAIL CARD --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            {{-- DATA PENGIRIM --}}
            <div class="row g-4 mb-4">

                {{-- NAMA --}}
                <div class="col-md-6">

                    <small class="text-muted d-block mb-1">
                        Nama
                    </small>

                    <h5 class="fw-semibold mb-0">
                        {{ $contactMessage->name }}
                    </h5>

                </div>

                {{-- EMAIL --}}
                <div class="col-md-6">

                    <small class="text-muted d-block mb-1">
                        Email
                    </small>

                    <h5 class="fw-semibold mb-0">
                        {{ $contactMessage->email }}
                    </h5>

                </div>

                {{-- TELEPON --}}
                <div class="col-md-6">

                    <small class="text-muted d-block mb-1">
                        Nomor Telepon
                    </small>

                    <h5 class="fw-semibold mb-0">

                        @if ($contactMessage->phone)

                            {{ $contactMessage->phone }}

                        @else

                            <span class="text-muted">
                                Tidak diisi
                            </span>

                        @endif

                    </h5>

                </div>

                {{-- TANGGAL --}}
                <div class="col-md-6">

                    <small class="text-muted d-block mb-1">
                        Tanggal Pesan
                    </small>

                    <h5 class="fw-semibold mb-0">
                        {{ $contactMessage->created_at->format('d M Y, H:i') }}
                    </h5>

                </div>

            </div>

            {{-- PESAN --}}
            <div class="border-top pt-4">

                <h5 class="fw-bold mb-3">
                    Isi Pesan
                </h5>

                <div
                    class="bg-light rounded p-4"
                    style="
                        white-space: pre-line;
                        line-height: 1.8;
                    "
                >
                    {{ $contactMessage->message }}
                </div>

            </div>

            {{-- BUTTON --}}
            <div class="d-flex gap-2 mt-4">

                <a
                    href="{{ route('admin.messages.index') }}"
                    class="btn btn-secondary"
                >
                    Kembali
                </a>

                <form
                    action="{{ route('admin.messages.destroy', $contactMessage) }}"
                    method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus pesan ini?')"
                >

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="btn btn-danger"
                    >
                        Hapus Pesan
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection