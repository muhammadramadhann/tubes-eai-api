@extends('layouts.base')

@section('title', 'HC | Update Data Permohonan Resign Karyawan')

@section('content')
    <ol class="breadcrumb my-4">
        <li class="breadcrumb-item"><a href="/"><small>Dashboard</small></a></li>
        <li class="breadcrumb-item active"><a href="/resign"><small>Permohonan Resign</small></a></li>
        <li class="breadcrumb-item active"><small>Update Data Permohonan Resign</small></li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-md-0 mb-2">Update Data Permohonan Resign</h4>
    </div>
    @if (session('fail'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('fail') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row mb-5">
        <div class="col-lg-7 col-12">
            <form action="{{ Route('resign.update', $resign->id) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <section id="absensi" class="mb-5">
                    <div class="mb-3">
                        <label for="id_karyawan" class="form-label">ID Karyawan</label>
                        <input type="number" class="form-control" id="id_karyawan" name="id_karyawan" value="{{ $resign->id_karyawan }}" placeholder="ID Karyawan yang Terdaftar">
                        @error('id_karyawan')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alasan_resign" class="form-label">Alasan Resign</label>
                        <select class="form-select" id="alasan_resign" name="alasan_resign" aria-label="Default select example">
                            <option selected disabled>-- Pilih alasan resign --</option>
                            <option @if ($resign->alasan_resign == "Melanjutkan pendidikan") @selected(true) @endif value="Melanjutkan pendidikan">Melanjutkan Pendidikan</option>
                            <option @if ($resign->alasan_resign == "Perubahan karir") @selected(true) @endif value="Perubahan karir">Perubahan karir</option>
                            <option @if ($resign->alasan_resign == "Permasalahan gaji") @selected(true) @endif value="Permasalahan gaji">Permasalahan gaji</option>
                            <option @if ($resign->alasan_resign == "Keluarga") @selected(true) @endif value="Keluarga">Keluarga</option>
                            <option @if ($resign->alasan_resign == "Lainnya") @selected(true) @endif value="Lainnya">Lainnya</option>
                        </select>
                        @error('alasan_resign')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="Deskripsi singkat alasan mengajukan permohonan resign">{{ $resign->deskripsi }}</textarea>
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
                            <option @if ($resign->status == "Dalam proses") @selected(true) @endif value="Dalam proses">Dalam proses</option>
                            <option @if ($resign->status == "Disetujui") @selected(true) @endif value="Disetujui">Disetujui</option>
                            <option @if ($resign->status == "Ditolak") @selected(true) @endif value="Ditolak">Ditolak</option>
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