@extends('layouts.base')

@section('title', 'Finance | Tambah Data Penggajian')

@section('content')
    <ol class="breadcrumb my-4">
        <li class="breadcrumb-item"><a href="/"><small>Dashboard</small></a></li>
        <li class="breadcrumb-item active"><a href="/karyawan"><small>Penggajian</small></a></li>
        <li class="breadcrumb-item active"><small>Tambah Data Penggajian</small></li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-5">
        <h4 class="fw-bold mb-md-0 mb-2">Tambah Data Penggajian</h4>
    </div>
    <div class="row mb-5">
        <div class="col-lg-7 col-12">
            <form action="{{ Route('penggajian.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <section id="personal-data" class="mb-4">
                    <h5 class="fw-bold">Data penggajian</h5>
                    <p class="text-muted"><small>Isi seluruh data penggajian</small></p>
                    <div class="mb-3">
                        <label for="id_absensi" class="form-label">id_absensi</label>
                        <input type="text" class="form-control" id="id_absensi" name="id_absensi" value="{{ old('iid_absensi') }}" placeholder="Id absensi karyawan ...">
                        @error('id_absensi')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                        <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" value="{{ old('nama_karyawan') }}" placeholder="Nama Karyawan ...">
                        @error('nama_karyawan')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-7 col-12 mb-md-0 mb-3">
                            <label for="divisi" class="form-label">Divisi</label>
                            <select class="form-select" id="divisi" name="divisi" aria-label="Default select example" value="{{ old('divisi') }}">
                                <option selected disabled>-- Pilih divisi --</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Finance">Finance</option>
                                <option value="IT Team">IT Team</option>
                                <option value="SCM">SCM</option>
                                <option value="HC">HC</option>
                            </select>
                            @error('divisi')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    <div class="row mb-3">
                        <div class="col-md-7 col-12 mb-md-0 mb-3">
                            <label for="hari_masuk" class="form-label">Hari Masuk</label>
                            <input type="integer" class="form-control" id="hari_masuk" name="hari_masuk" placeholder="0">
                            @error('hari_masuk')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-7 col-12 mb-md-0 mb-3">
                            <label for="hari_cuti" class="form-label">Hari Cuti</label>
                            <input type="integer" class="form-control" id="hari_cuti" name="hari_cuti" placeholder="0">
                            @error('hari_cuti')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-7 col-12 mb-md-0 mb-3">
                            <input type="hidden" class="form-control" id="gaji_perhari" name="gaji_perhari" value="150000">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-7 col-12 mb-md-0 mb-3">
                            <label for="tanggal_penggajian" class="form-label">Tanggal Penggajian</label>
                            <input type="date" class="form-control" id="tanggal_penggajian" name="tanggal_penggajian" placeholder="2022-10-02">
                            @error('tanggal_penggajian')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>                    
                    </div>
                </section>
                <section id="button" class="d-lg-flex d-block">
                    <button type="reset" class="btn btn-secondary me-2">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit Data</button>
                </section>
            </form>
        </div>
    </div>
@endsection