@extends('layouts.base')

@section('title', 'HC | Tambah Data Pengajuan Cuti Karyawan')

@section('content')
    <ol class="breadcrumb my-4">
        <li class="breadcrumb-item"><a href="/"><small>Dashboard</small></a></li>
        <li class="breadcrumb-item active"><a href="/pengajuan-cuti"><small>Pengajuan Cuti</small></a></li>
        <li class="breadcrumb-item active"><small>Tambah Data Pengajuan Cuti</small></li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-md-0 mb-2">Tambah Data Pengajuan Cuti Karyawan</h4>
    </div>
    @if (session('fail'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('fail') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row mb-5">
        <div class="col-lg-7 col-12">
            <form action="{{ Route('pengajuan-cuti.create') }}" method="POST">
                @csrf
                <section id="absensi" class="mb-4">
                    <div class="mb-3">
                        <label for="id_karyawan" class="form-label">ID Karyawan</label>
                        <input type="number" class="form-control" id="id_karyawan" name="id_karyawan" value="{{ old('id_karyawan') }}" placeholder="ID Karyawan yang Terdaftar">
                        @error('id_karyawan')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kategori_cuti" class="form-label">Kategori Cuti</label>
                        <select class="form-select" id="kategori_cuti" name="kategori_cuti" aria-label="Default select example">
                            <option selected disabled>-- Pilih kategori cuti --</option>
                            <option value="Cuti tahunan">Cuti tahunan</option>
                            <option value="Sakit">Sakit</option>
                            <option value="Menstruasi">Menstruasi</option>
                            <option value="Melahirkan">Melahirkan</option>
                            <option value="Lainnya">Lainnya</option>
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
                            <input type="date" class="form-control" id="tanggal_cuti" name="tanggal_cuti" value="{{ old('tanggal_cuti') }}">
                            @error('tanggal_cuti')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-12">
                            <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="{{ old('tanggal_kembali') }}">
                            @error('tanggal_kembali')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="Deskripsi singkat mengenai cuti yang diajukan">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
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