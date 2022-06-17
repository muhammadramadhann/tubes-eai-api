@extends('layouts.base')

@section('title', 'HC | Tambah Data Karyawan')

@section('content')
    <ol class="breadcrumb my-4">
        <li class="breadcrumb-item"><a href="/"><small>Dashboard</small></a></li>
        <li class="breadcrumb-item active"><a href="/karyawan"><small>Karyawan</small></a></li>
        <li class="breadcrumb-item active"><small>Tambah Data Karyawan</small></li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-5">
        <h4 class="fw-bold mb-md-0 mb-2">Tambah Data Karyawan</h4>
    </div>
    <div class="row mb-5">
        <div class="col-lg-7 col-12">
            <form action="{{ Route('karyawan.create') }}" method="POST">
                @csrf
                <section id="personal-data" class="mb-4">
                    <h5 class="fw-bold">Personal data</h5>
                    <p class="text-muted"><small>Isi seluruh data informasi personal karyawan</small></p>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
                        @error('nama')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-7 col-12 mb-md-0 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-5 col-12">
                            <label for="nomor_hp" class="form-label">Nomor Handphone</label>
                            <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp') }}">
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
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk1" value="Pria">
                            <label class="form-check-label" for="jk1">Pria</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk2" value="Wanita">
                            <label class="form-check-label" for="jk2">Wanita</label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-7 col-12 mb-md-0 mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                            @error('tempat_lahir')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-5 col-12">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
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
                                <input class="form-check-input" type="radio" name="status_pernikahan" id="sp1" value="Lajang">
                                <label class="form-check-label" for="sp1">Lajang</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_pernikahan" id="sp2" value="Menikah">
                                <label class="form-check-label" for="sp2">Menikah</label>
                            </div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="3">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </section>
                <section id="employment-data" class="mb-4">
                    <h5 class="fw-bold">Employment data</h5>
                    <p class="text-muted"><small>Isi seluruh data informasi pekerjaan karyawan</small></p>
                    <div class="row mb-3">
                        <div class="col-md-7 col-12 mb-md-0 mb-3">
                            <label for="divisi" class="form-label">Divisi</label>
                            <select class="form-select" id="divisi" name="divisi" aria-label="Default select example" value="{{ old('divisi') }}">
                                <option selected disabled>-- Pilih divisi --</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Finance">Finance</option>
                                <option value="IT">IT</option>
                                <option value="SCM">SCM</option>
                                <option value="HC">HC</option>
                            </select>
                            @error('divisi')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-5 col-12">
                            <label for="tanggal_bergabung" class="form-label">Tanggal Bergabung</label>
                            <input type="date" class="form-control" id="tanggal_bergabung" name="tanggal_bergabung" value="{{ old('tanggal_bergabung') }}">
                            @error('tanggal_bergabung')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </section>
                <section id="button" class="d-lg-flex d-block">
                    <button type="submit" class="btn btn-secondary me-2">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit Data</button>
                </section>
            </form>
        </div>
    </div>
@endsection