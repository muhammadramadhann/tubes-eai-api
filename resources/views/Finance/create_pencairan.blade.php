@extends('layouts.base')

@section('title', 'Finance | Tambah Data Pencairan')

@section('content')
    <ol class="breadcrumb my-4">
        <li class="breadcrumb-item"><a href="/"><small>Dashboard</small></a></li>
        <li class="breadcrumb-item active"><a href="/karyawan"><small>Pencairan</small></a></li>
        <li class="breadcrumb-item active"><small>Tambah Data Pencairan</small></li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-5">
        <h4 class="fw-bold mb-md-0 mb-2">Tambah Data Pencairan</h4>
    </div>
    <div class="row mb-5">
        <div class="col-lg-7 col-12">
            <form action="{{ Route('pencairan.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <section id="personal-data" class="mb-4">
                    <h5 class="fw-bold">Data pencairan</h5>
                    <p class="text-muted"><small>Isi seluruh data pencairan</small></p>
                    <div class="mb-3">
                        <label for="nama_pegawai" class="form-label">id_pengajuan</label>
                        <input type="text" class="form-control" id="id_pengajuan" name="id_pengajuan" value="{{ old('id_pengajuan') }}" placeholder="ID pengajuan">
                        @error('id_pengajuan')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jml_dana_keluar" class="form-label">Jumlah Dana keluar</label>
                        <input type="text" class="form-control" id="jml_dana_keluar" name="jml_dana_keluar" value="{{ old('jml_dana_keluar') }}" placeholder="Rp. 45.0000">
                        @error('jml_dana_keluar')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-7 col-12 mb-md-0 mb-3">
                            <label for="tanggal_pencairan" class="form-label">Tanggal Pencairan</label>
                            <input type="date" class="form-control" id="tanggal_pencairan" name="tanggal_pencairan" placeholder="2022-10-02">
                            @error('tanggal_pencairan')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea style="height: 100px" class="form-control" id="keterangan" name="keterangan" placeholder="Isi keterangan ..."></textarea>
                        @error('keterangan')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                        <div class="row mb-3">
                        <div class="col-md-7 col-12 mb-md-0 mb-3">
                            <label for="bukti" class="form-label">Bukti</label>
                            <input type="file" class="form-control" id="bukti" name="bukti">
                            @error('bukti')
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