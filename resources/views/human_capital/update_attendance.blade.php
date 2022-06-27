@extends('layouts.base')

@section('title', 'HC | Update Data Absensi Karyawan')

@section('content')
    <ol class="breadcrumb my-4">
        <li class="breadcrumb-item"><a href="/"><small>Dashboard</small></a></li>
        <li class="breadcrumb-item active"><a href="/absensi"><small>Absensi</small></a></li>
        <li class="breadcrumb-item active"><small>Update Data Absensi</small></li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-md-0 mb-2">Update Data Absensi</h4>
    </div>
    @if (session('fail'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('fail') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row mb-5">
        <div class="col-lg-7 col-12">
            <form action="{{ Route('absensi.update', $attendance->id) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <section id="absensi" class="mb-4">
                    <div class="mb-3">
                        <label for="id_karyawan" class="form-label">ID Karyawan</label>
                        <input type="number" class="form-control" id="id_karyawan" name="id_karyawan" value="{{ $attendance->id_karyawan }}" placeholder="ID Karyawan yang Terdaftar">
                        @error('id_karyawan')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 col-12">
                            <label for="tanggal_kerja" class="form-label">Tanggal Kerja</label>
                            <input type="date" class="form-control" id="tanggal_kerja" name="tanggal_kerja" value="{{ $attendance->tanggal_kerja }}">
                            @error('tanggal_kerja')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 col-12 mb-md-0 mb-3">
                            <label for="absensi_masuk" class="form-label">Absensi Masuk</label>
                            <input type="time" class="form-control" id="absensi_masuk" name="absensi_masuk" value="{{ $attendance->absensi_masuk }}">
                            @error('absensi_masuk')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-12">
                            <label for="absensi_masuk" class="form-label">Absensi Keluar</label>
                            <input type="time" class="form-control" id="absensi_keluar" name="absensi_keluar" value="{{ $attendance->absensi_keluar }}">
                            @error('absensi_keluar')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="Deskripsi singkat pekerjaan yang akan atau sudah dilakukan hari ini">{{ $attendance->deskripsi }}</textarea>
                        @error('deskripsi')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" aria-label="Default select example">
                            <option selected disabled>-- Pilih status --</option>
                            <option @if ($attendance->status == "Dalam verifikasi") @selected(true) @endif value="Dalam verifikasi">Dalam verifikasi</option>
                            <option @if ($attendance->status == "Sudah diverifikasi") @selected(true) @endif value="Sudah diverifikasi">Sudah diverifikasi</option>
                            <option @if ($attendance->status == "Absensi tidak valid") @selected(true) @endif value="Absensi tidak valid">Absensi tidak valid</option>
                        </select>
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