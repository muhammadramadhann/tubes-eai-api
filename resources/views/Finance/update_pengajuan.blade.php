@extends('layouts.base')

@section('title', 'Finance | Update Data Pengajuan')

@section('content')
    <ol class="breadcrumb my-4">
    <li class="breadcrumb-item"><a href="/"><small>Dashboard</small></a></li>
        <li class="breadcrumb-item active"><a href="/karyawan"><small>Pengajuan</small></a></li>
        <li class="breadcrumb-item active"><small>Update Data Pengajuan</small></li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-5">
        <h4 class="fw-bold mb-md-0 mb-2">Update Data Pengajuan</h4>
    </div>
    <div class="row mb-5">
        <div class="col-lg-7 col-12">
            <form action="{{ Route('pengajuan.update', $pengajuan->id) }}" method="POST"  enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                  <section id="personal-data" class="mb-4">
                    <h5 class="fw-bold">Data pengajuan</h5>
                    <p class="text-muted"><small>Isi seluruh data pengajuan</small></p>
                    <div class="mb-3">
                        <label for="nama_pegawai" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="{{ $pengajuan->nama_pegawai}}" placeholder="Nama Lengkap Karyawan">
                        @error('nama_pegawai')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-7 col-12 mb-md-0 mb-3">
                            <label for="divisi" class="form-label">Divisi</label>
                            <select class="form-select" id="divisi" name="divisi" aria-label="Default select example">
                                <option selected disabled>-- Pilih divisi --</option>
                                <option @if ($pengajuan->divisi == "Marketing") @selected(true) @endif value="Marketing">Marketing</option>
                                <option @if ($pengajuan->divisi == "Finance") @selected(true) @endif value="Finance">Finance</option>
                                <option @if ($pengajuan->divisi == "IT") @selected(true) @endif value="IT Team">IT</option>
                                <option @if ($pengajuan->divisi == "SCM") @selected(true) @endif value="SCM">SCM</option>
                                <option @if ($pengajuan->divisi == "HC") @selected(true) @endif value="HC">HC</option>
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
                            <input type="file" class="form-control" id="proposal" name="proposal" value="{{ $pengajuan->proposal}}">
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
                            <input type="date" class="form-control" id="tanggal_mengajukan" value="{{ $pengajuan->tanggal_mengajukan}}" name="tanggal_mengajukan" placeholder="2022-10-02">
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
                            <input type="text" class="form-control" id="status_pengajuan" value="{{ $pengajuan->status_pengajuan}}" name="status_pengajuan" value="Tertunda" readonly>
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
                    <button type="submit" class="btn btn-primary">Update Data</button>
                </section>
            </form>
        </div>
    </div>
@endsection