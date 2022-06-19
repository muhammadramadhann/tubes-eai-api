@extends('layouts.base')

@section('title', 'Finance | Tambah Data Pengajuan')

@section('content')
    <ol class="breadcrumb my-4">
        <li class="breadcrumb-item"><a href="/"><small>Dashboard</small></a></li>
        <li class="breadcrumb-item active"><a href="/karyawan"><small>Pengajuan</small></a></li>
        <li class="breadcrumb-item active"><small>Tambah Data Pengajuan</small></li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-5">
        <h4 class="fw-bold mb-md-0 mb-2">Tambah Data Pengajuan</h4>
    </div>
    <div class="row mb-5">
        <div class="col-lg-7 col-12">
            <form action="{{ Route('pengajuan.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <section id="personal-data" class="mb-4">
                    <h5 class="fw-bold">Data pengajuan</h5>
                    <p class="text-muted"><small>Isi seluruh data pengajuan</small></p>
                    <div class="mb-3">
                        <label for="nama_pegawai" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="{{ old('nama_pegawai') }}" placeholder="Nama Lengkap Karyawan">
                        @error('nama_pegawai')
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
                    </div>
                        <div class="row mb-3">
                        <div class="col-md-7 col-12 mb-md-0 mb-3">
                            <label for="proposal" class="form-label">Proposal</label>
                            <input type="file" class="form-control" id="proposal" name="proposal">
                            @error('proposal')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        </div>
                    <div class="row mb-3">
                        <div class="col-md-7 col-12 mb-md-0 mb-3">
                            <label for="tanggal_mengajukan" class="form-label">Tanggal Mengajukan</label>
                            <input type="date" class="form-control" id="tanggal_mengajukan" name="tanggal_mengajukan" placeholder="2022-10-02">
                            @error('tanggal_mengajukan')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    </div>
                    <div class="row mb-3">
                        <div class="col-md-7 col-12 mb-md-0 mb-3">
                            <label for="status_pengajuan" class="form-label">Status pengajuan</label>
                            <input type="text" class="form-control" id="status_pengajuan" name="status_pengajuan" value="Tertunda" readonly>
                            @error('status_pengajuan')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
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