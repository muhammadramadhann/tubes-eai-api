@extends('layouts.base')

@section('title', 'Marketing | Tambah Data Laporan Penjualan')

@section('content')
    <ol class="breadcrumb my-4">
        <li class="breadcrumb-item"><a href="/"><small>Dashboard</small></a></li>
        <li class="breadcrumb-item active"><a href="/sales_report"><small>Laporan Penjualan</small></a></li>
        <li class="breadcrumb-item active"><small>Tambah Data Laporan Penjualan</small></li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-5">
        <h4 class="fw-bold mb-md-0 mb-2">Tambah Data Laporan Penjualan</h4>
    </div>
    <div class="row mb-5">
        <div class="col-lg-7 col-12">
            <form action="{{ Route('sales_report.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <section id="personal-data" class="mb-4">
                    <h5 class="fw-bold">Data Laporan Penjualan</h5>
                    <p class="text-muted"><small>Isi seluruh data laporan penjualan</small></p>
                    <div class="mb-3">
                        <label for="tanggal_penjualan" class="form-label">Tanggal Penjualan</label>
                        <input type="date" class="form-control" id="tanggal_penjualan" name="tanggal_penjualan" value="{{ old('tanggal_penjualan') }}" placeholder="2022-10-03">
                        @error('tanggal_penjualan')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga_produk" class="form-label">Harga Produk</label>
                        <input type="integer" class="form-control" id="harga_produk" name="harga_produk" value="{{ old('harga_produk') }}" placeholder="200000">
                        @error('harga_produk')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_penjualan" class="form-label">Jumlah Penjualan</label>
                        <input type="integer" class="form-control" id="jumlah_penjualan" name="jumlah_penjualan" value="{{ old('jumlah_penjualan') }}" placeholder="5">
                        @error('jumlah_penjualan')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="strategi" class="form-label">Strategi</label>
                        <input type="number" class="form-control" id="strategi" name="strategi" value="{{ old('strategi') }}">
                        @error('strategi')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-7 col-12 mb-md-0 mb-3">
                            <label for="status_target" class="form-label">Status Target</label>
                            <select class="form-select" id="status_target" name="status_target" aria-label="Default select example" value="{{ old('status_target') }}">
                                <option selected disabled>-- Pilih Status Target --</option>
                                <option value="Tercapai">Tercapai</option>
                                <option value="Tidak tercapai">Tidak tercapai</option>
                            </select>
                            @error('status_target')
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