@extends('layouts.base')

@section('title', 'HC | Update Data Pelamar')

@section('content')
    <ol class="breadcrumb my-4">
        <li class="breadcrumb-item"><a href="/"><small>Dashboard</small></a></li>
        <li class="breadcrumb-item active"><a href="/pelamar"><small>Pelamar</small></a></li>
        <li class="breadcrumb-item active"><small>Update Data Pelamar</small></li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-5">
        <h4 class="fw-bold mb-md-0 mb-2">Update Data Pelamar</h4>
    </div>
    <div class="row mb-5">
        <div class="col-lg-7 col-12">
            <form action="{{ Route('pelamar.update', $applicant->id) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <section id="personal-data" class="mb-4">
                    <h5 class="fw-bold">Personal data</h5>
                    <p class="text-muted"><small>Isi seluruh data informasi personal pelamar</small></p>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap Pelamar" value="{{ $applicant->nama }}">
                        @error('nama')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-7 col-12 mb-md-0 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="johndoe@gmail.com" value="{{ $applicant->email }}">
                            @error('email')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-5 col-12">
                            <label for="nomor_hp" class="form-label">Nomor Handphone</label>
                            <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" placeholder="08*****" value="{{ $applicant->nomor_hp }}">
                            @error('nomor_hp')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-block mb-3">Jenis Kelamin</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk1" value="Pria" 
                            @if ($applicant->jenis_kelamin == "Pria") @checked(true) @endif>
                            <label class="form-check-label" for="jk1">Pria</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk2" value="Wanita"
                            @if ($applicant->jenis_kelamin == "Wanita") @checked(true) @endif>
                            <label class="form-check-label" for="jk2">Wanita</label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-7 col-12 mb-md-0 mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Jakarta" value="{{ $applicant->tempat_lahir }}">
                            @error('tempat_lahir')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-5 col-12">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $applicant->tanggal_lahir }}">
                            @error('tanggal_lahir')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-block mb-3">Status Pernikahan</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_pernikahan" id="sp1" value="Lajang"
                            @if ($applicant->status_pernikahan == "Lajang") @checked(true) @endif>
                            <label class="form-check-label" for="sp1">Lajang</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_pernikahan" id="sp2" value="Menikah"
                            @if ($applicant->status_pernikahan == "Menikah") @checked(true) @endif>
                            <label class="form-check-label" for="sp2">Menikah</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Jl. Teratai No. 2, Pasar Minggu, Jakarta Selatan">{{ $applicant->alamat }}</textarea>
                        @error('alamat')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </section>
                <section id="employment-data" class="mb-5">
                    <h5 class="fw-bold">Applicant data</h5>
                    <p class="text-muted"><small>Isi seluruh data informasi calon pelamar pekerjaan</small></p>
                    <div class="row mb-3">
                        <div class="col-md-7 col-12 mb-md-0 mb-3">
                            <label for="pilihan_divisi" class="form-label">Pilihan Divisi</label>
                            <select class="form-select" id="pilihan_divisi" name="pilihan_divisi" aria-label="Default select example">
                                <option selected disabled>-- Pilih divisi --</option>
                                <option @if ($applicant->pilihan_divisi == "Marketing") @selected(true) @endif value="Marketing">Marketing</option>
                                <option @if ($applicant->pilihan_divisi == "Finance") @selected(true) @endif value="Finance">Finance</option>
                                <option @if ($applicant->pilihan_divisi == "IT") @selected(true) @endif value="IT">IT</option>
                                <option @if ($applicant->pilihan_divisi == "SCM") @selected(true) @endif value="SCM">SCM</option>
                                <option @if ($applicant->pilihan_divisi == "HC") @selected(true) @endif value="HC">HC</option>
                            </select>
                            @error('pilihan_divisi')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="status" class="form-label mt-3">Status Pelamar</label>
                            <select class="form-select" id="status" name="status" aria-label="Default select example">
                                <option selected disabled>-- Pilih status --</option>
                                <option @if ($applicant->status == "Dalam seleksi") @selected(true) @endif value="Dalam seleksi">Dalam seleksi</option>
                                <option @if ($applicant->status == "Lolos") @selected(true) @endif value="Lolos">Lolos</option>
                                <option @if ($applicant->status == "Tidak Lolos") @selected(true) @endif value="Tidak Lolos">Tidak lolos</option>
                            </select>
                            @error('status')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-5 col-12">
                            <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
                            <input type="text" class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir" value="{{ $applicant->pendidikan_terakhir }}" placeholder="S1 Sistem Informasi">
                            @error('pendidikan_terakhir')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </section>
                <section id="button" class="d-lg-flex d-block">
                    <button type="reset" class="btn btn-secondary me-2">Reset</button>
                    <button type="submit" class="btn btn-primary">Update Data</button>
                </section>
            </form>
        </div>
    </div>
@endsection