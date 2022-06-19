@extends('layouts.base')

@section('title', 'HC | Update Data Pengajuan Cuti Karyawan')

@section('content')
    <ol class="breadcrumb my-4">
        <li class="breadcrumb-item"><a href="/"><small>Dashboard</small></a></li>
        <li class="breadcrumb-item active"><a href="/pengajuan-cuti"><small>Pengajuan Cuti</small></a></li>
        <li class="breadcrumb-item active"><small>Update Data Pengajuan Cuti</small></li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-md-0 mb-2">Update Data Pengajuan Cuti Karyawan</h4>
    </div>
    @if (session('fail'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('fail') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row mb-5">
        <div class="col-lg-7 col-12">
            <form action="{{ Route('pengajuan-cuti.update', $offwork->id) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <section id="absensi" class="mb-4">
                    <div class="mb-3">
                        <label for="id_karyawan" class="form-label">ID Karyawan</label>
                        <input type="number" class="form-control" id="id_karyawan" name="id_karyawan" value="{{ $offwork->id_karyawan }}" placeholder="ID Karyawan yang Terdaftar">
                        @error('id_karyawan')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kategori_cuti" class="form-label">Kategori Cuti</label>
                        <select class="form-select" id="kategori-cuti" name="kategori_cuti" aria-label="Default select example">
                            <option selected disabled>-- Pilih kategori cuti --</option>
                            <option @if ($offwork->kategori_cuti == "Cuti tahunan") @selected(true) @endif value="Cuti tahunan">Cuti tahunan</option>
                            <option @if ($offwork->kategori_cuti == "Sakit") @selected(true) @endif value="Sakit">Sakit</option>
                            <option @if ($offwork->kategori_cuti == "Menstruasi") @selected(true) @endif value="Menstruasi">Menstruasi</option>
                            <option @if ($offwork->kategori_cuti == "Melahirkan") @selected(true) @endif value="Melahirkan">Melahirkan</option>
                            <option @if ($offwork->kategori_cuti == "Lainnya") @selected(true) @endif value="Lainnya">Lainnya</option>
                        </select>
                        @error('kategori_cuti')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 col-12 mb-md-0 mb-3">
                            <label for="tanggal_cuti" class="form-label">Tanggal Cuti</label>
                            <input type="date" class="form-control" id="tanggal_cuti" name="tanggal_cuti" value="{{ $offwork->tanggal_cuti }}">
                            @error('tanggal_cuti')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-12">
                            <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="{{ $offwork->tanggal_kembali }}">
                            @error('tanggal_kembali')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="Deskripsi singkat mengenai cuti yang diajukan">{{ $offwork->deskripsi }}</textarea>
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
                            <option @if ($offwork->status == "Dalam proses") @selected(true) @endif value="Dalam proses">Dalam proses</option>
                            <option @if ($offwork->status == "Disetujui") @selected(true) @endif value="Disetujui">Disetujui</option>
                            <option @if ($offwork->status == "Ditolak") @selected(true) @endif value="Ditolak">Ditolak</option>
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