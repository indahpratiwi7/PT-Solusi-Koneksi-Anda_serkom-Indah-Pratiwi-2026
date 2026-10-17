@extends('layouts.admin')

@section('title', 'Profil Admin')

@section('page-title', 'Profil Admin')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="mb-4">
        <h2 class="fw-bold mb-1">
            Profil Admin
        </h2>

        <p class="text-muted mb-0">
            Kelola informasi akun dan keamanan administrator website.
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

    {{-- ERROR --}}
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


    {{-- ============================= --}}
    {{-- INFORMASI AKUN --}}
    {{-- ============================= --}}

    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body p-4">

            <div class="mb-4">

                <h5 class="fw-bold mb-1">
                    Informasi Akun
                </h5>

                <p class="text-muted mb-0">
                    Perbarui nama dan email yang digunakan untuk akun admin.
                </p>

            </div>

            <form
                action="{{ route('admin.profile.update') }}"
                method="POST"
            >

                @csrf
                @method('PUT')

                {{-- NAMA ADMIN --}}
                <div class="mb-4">

                    <label
                        for="name"
                        class="form-label fw-semibold"
                    >
                        Nama Admin
                    </label>

                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', auth()->user()->name) }}"
                        placeholder="Masukkan nama admin"
                        required
                    >

                    @error('name')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- EMAIL --}}
                <div class="mb-4">

                    <label
                        for="email"
                        class="form-label fw-semibold"
                    >
                        Email Admin
                    </label>

                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', auth()->user()->email) }}"
                        placeholder="Masukkan email admin"
                        required
                    >

                    @error('email')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- BUTTON --}}
                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Simpan Perubahan
                </button>

            </form>

        </div>

    </div>


    {{-- ============================= --}}
    {{-- KEAMANAN AKUN --}}
    {{-- ============================= --}}

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <div class="mb-4">

                <h5 class="fw-bold mb-1">
                    Keamanan Akun
                </h5>

                <p class="text-muted mb-0">
                    Ganti password admin untuk menjaga keamanan akun.
                </p>

            </div>

            <form
                action="{{ route('admin.profile.update') }}"
                method="POST"
            >

                @csrf
                @method('PUT')

                {{-- PASSWORD SAAT INI --}}
                <div class="mb-4">

                    <label
                        for="current_password"
                        class="form-label fw-semibold"
                    >
                        Password Saat Ini
                    </label>

                    <input
                        type="password"
                        name="current_password"
                        id="current_password"
                        class="form-control @error('current_password') is-invalid @enderror"
                        placeholder="Masukkan password saat ini"
                    >

                    @error('current_password')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- PASSWORD BARU --}}
                <div class="mb-4">

                    <label
                        for="password"
                        class="form-label fw-semibold"
                    >
                        Password Baru
                    </label>

                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Masukkan password baru"
                    >

                    @error('password')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- KONFIRMASI PASSWORD --}}
                <div class="mb-4">

                    <label
                        for="password_confirmation"
                        class="form-label fw-semibold"
                    >
                        Konfirmasi Password Baru
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        class="form-control"
                        placeholder="Ulangi password baru"
                    >

                </div>


                {{-- BUTTON --}}
                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Ganti Password
                </button>

            </form>

        </div>

    </div>

</div>

@endsection