@extends('layouts.base')

@section('title', 'HC | Update Data Karyawan')

@section('content')
    <ol class="breadcrumb my-4">
        <li class="breadcrumb-item"><a href="/"><small>Dashboard</small></a></li>
        <li class="breadcrumb-item active"><a href="/karyawan"><small>Karyawan</small></a></li>
        <li class="breadcrumb-item active"><small>Update Data Karyawan</small></li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-5">
        <h4 class="fw-bold mb-md-0 mb-2">Update Data Karyawan</h4>
    </div>
    <div class="row mb-5">
        <div class="col-lg-7 col-12">
            <form action="{{ Route('karyawan.update', $employee->id) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <section id="personal-data" class="mb-4">
                    <h5 class="fw-bold">Personal data</h5>
                    <p class="text-muted"><small>Isi seluruh data informasi personal karyawan</small></p>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap Karyawan" value="{{ $employee->nama }}">
                        @error('nama')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-7 col-12 mb-md-0 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="johndoe@gmail.com" value="{{ $employee->email }}">
                            @error('email')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-5 col-12">
                            <label for="nomor_hp" class="form-label">Nomor Handphone</label>
                            <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" placeholder="08*****" value="{{ $employee->nomor_hp }}">
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
                            @if ($employee->jenis_kelamin == "Pria") @checked(true) @endif>
                            <label class="form-check-label" for="jk1">Pria</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk2" value="Wanita"
                            @if ($employee->jenis_kelamin == "Wanita") @checked(true) @endif>
                            <label class="form-check-label" for="jk2">Wanita</label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-7 col-12 mb-md-0 mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Jakarta" value="{{ $employee->tempat_lahir }}">
                            @error('tempat_lahir')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-5 col-12">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $employee->tanggal_lahir }}">
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
                                @if ($employee->status_pernikahan == "Lajang") @checked(true) @endif>
                                <label class="form-check-label" for="sp1">Lajang</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_pernikahan" id="sp2" value="Menikah"
                                @if ($employee->status_pernikahan == "Menikah") @checked(true) @endif>
                                <label class="form-check-label" for="sp2">Menikah</label>
                            </div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Jl. Teratai No. 2, Pasar Minggu, Jakarta Selatan">{{ $employee->alamat }}</textarea>
                        @error('alamat')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </section>
                <section id="employment-data" class="mb-5">
                    <h5 class="fw-bold">Employment data</h5>
                    <p class="text-muted"><small>Isi seluruh data informasi pekerjaan karyawan</small></p>
                    <div class="row mb-3">
                        <div class="col-md-7 col-12 mb-md-0 mb-3">
                            <div class="mb-3">
                                <label for="divisi" class="form-label">Divisi</label>
                                <select class="form-select" id="divisi" name="divisi" aria-label="Default select example">
                                    <option selected disabled>-- Pilih divisi --</option>
                                    <option @if ($employee->divisi == "Marketing") @selected(true) @endif value="Marketing">Marketing</option>
                                    <option @if ($employee->divisi == "Finance") @selected(true) @endif value="Finance">Finance</option>
                                    <option @if ($employee->divisi == "IT") @selected(true) @endif value="IT">IT Team</option>
                                    <option @if ($employee->divisi == "SCM") @selected(true) @endif value="SCM">SCM</option>
                                    <option @if ($employee->divisi == "HC") @selected(true) @endif value="HC">HC</option>
                                </select>
                                @error('divisi')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5 col-12">
                        <label for="tanggal_bergabung" class="form-label">Tanggal Bergabung</label>
                            <input type="date" class="form-control" id="tanggal_bergabung" name="tanggal_bergabung" value="{{ $employee->tanggal_bergabung }}">
                            @error('tanggal_bergabung')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label d-block mb-3">Status</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status1" value="Aktif"
                            @if ($employee->status == "Aktif") @checked(true) @endif>
                            <label class="form-check-label" for="status1">Aktif</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status2" value="Resign"
                            @if ($employee->status == "Resign") @checked(true) @endif>
                            <label class="form-check-label" for="status2">Resign</label>
                        </div>
                        @error('status')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
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