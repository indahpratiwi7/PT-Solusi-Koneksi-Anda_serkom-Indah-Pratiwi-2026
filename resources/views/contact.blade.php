@extends('layouts.app')

@section('title', 'Kontak Kami - PT Solusi Koneksi Anda')

@section('content')

{{-- HEADER --}}
<section class="bg-light py-5">
    <div class="container text-center">

        <h1 class="fw-bold">
            Kontak Kami
        </h1>

        <p class="text-secondary mb-0">
            Hubungi PT Solusi Koneksi Anda untuk informasi lebih lanjut.
        </p>

    </div>
</section>


{{-- KONTAK --}}
<section class="py-5">

    <div class="container">

        <div class="row g-5">

            {{-- INFORMASI KONTAK --}}
            <div class="col-lg-5">

                <h2 class="fw-bold mb-3">
                    Hubungi Kami
                </h2>

                <p class="text-secondary mb-4">
                    Silakan hubungi kami melalui informasi kontak yang tersedia
                    atau kirimkan pesan melalui formulir di samping.
                </p>


                {{-- ALAMAT --}}
                <div class="d-flex gap-3 mb-4">

                    <div style="font-size: 24px;">
                        📍
                    </div>

                    <div>
                        <h5 class="fw-bold mb-1">
                            Alamat
                        </h5>

                        <p class="text-secondary mb-0">
                            Jl. Raya Pajajaran, Bogor, Jawa Barat, Indonesia
                        </p>
                    </div>

                </div>


                {{-- TELEPON --}}
                <div class="d-flex gap-3 mb-4">

                    <div style="font-size: 24px;">
                        📞
                    </div>

                    <div>
                        <h5 class="fw-bold mb-1">
                            Telepon
                        </h5>

                        <p class="text-secondary mb-0">
                            0812-3456-7890
                        </p>
                    </div>

                </div>


                {{-- EMAIL --}}
                <div class="d-flex gap-3 mb-4">

                    <div style="font-size: 24px;">
                        ✉️
                    </div>

                    <div>
                        <h5 class="fw-bold mb-1">
                            Email
                        </h5>

                        <p class="text-secondary mb-0">
                            info@solusikoneksianda.com
                        </p>
                    </div>

                </div>


                {{-- GOOGLE MAPS --}}
                <div class="mt-4">

                    <h5 class="fw-bold mb-3">
                        Lokasi Kami
                    </h5>

                    <div
                        class="rounded-4 overflow-hidden shadow-sm"
                        style="height: 280px;"
                    >

                        <iframe
                            src="https://maps.google.com/maps?q=Jl.%20Raya%20Pajajaran%20Bogor&t=&z=15&ie=UTF8&iwloc=&output=embed"
                            width="100%"
                            height="100%"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                        >
                        </iframe>

                    </div>

                </div>

            </div>


            {{-- FORM PESAN --}}
            <div class="col-lg-7">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body p-4 p-lg-5">

                        <h2 class="fw-bold mb-4">
                            Kirim Pesan
                        </h2>


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


                        <form
                            action="{{ route('contact.store') }}"
                            method="POST"
                        >

                            @csrf


                            {{-- NAMA --}}
                            <div class="mb-3">

                                <label
                                    for="name"
                                    class="form-label fw-semibold"
                                >
                                    Nama
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control"
                                    value="{{ old('name') }}"
                                    placeholder="Masukkan nama Anda"
                                    required
                                >

                            </div>


                            {{-- EMAIL --}}
                            <div class="mb-3">

                                <label
                                    for="email"
                                    class="form-label fw-semibold"
                                >
                                    Email
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="form-control"
                                    value="{{ old('email') }}"
                                    placeholder="Masukkan email Anda"
                                    required
                                >

                            </div>


                            {{-- NOMOR TELEPON --}}
                            <div class="mb-3">

                                <label
                                    for="phone"
                                    class="form-label fw-semibold"
                                >
                                    Nomor Telepon
                                </label>

                                <input
                                    type="text"
                                    name="phone"
                                    id="phone"
                                    class="form-control"
                                    value="{{ old('phone') }}"
                                    placeholder="Masukkan nomor telepon"
                                >

                            </div>


                            {{-- PESAN --}}
                            <div class="mb-4">

                                <label
                                    for="message"
                                    class="form-label fw-semibold"
                                >
                                    Pesan
                                </label>

                                <textarea
                                    name="message"
                                    id="message"
                                    rows="5"
                                    class="form-control"
                                    placeholder="Tuliskan pesan Anda..."
                                    required
                                >{{ old('message') }}</textarea>

                            </div>


                            {{-- BUTTON --}}
                            <button
                                type="submit"
                                class="btn btn-primary w-100"
                            >
                                Kirim Pesan
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection