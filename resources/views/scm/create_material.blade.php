@extends('layouts.base')

@section('title', 'SCM | Tambah Data Material')

@section('content')
    <ol class="breadcrumb my-4">
        <li class="breadcrumb-item"><a href="/"><small>Dashboard</small></a></li>
        <li class="breadcrumb-item active"><a href="/material"><small>Material</small></a></li>
        <li class="breadcrumb-item active"><small>Tambah Data Material</small></li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-5">
        <h4 class="fw-bold mb-md-0 mb-2">Tambah Data Material</h4>
    </div>
    <div class="row mb-5">
        <div class="col-lg-7 col-12">
            <form action="{{ Route('material.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <section id="data-material" class="mb-4">
                    <h5 class="fw-bold">Data Material</h5>
                    <p class="text-muted"><small>Isi seluruh data material</small></p>
                    <div class="mb-3">
                        <label for="nama_material" class="form-label">Nama Material</label>
                        <input type="text" class="form-control" id="nama_material" name="nama_material" value="{{ old('nama_material') }}" placeholder="Kerangka GPS">
                        @error('nama_material')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- jenis material --}}
                <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis Material</label>
                        <input type="text" class="form-control" id="jenis" name="jenis" value="{{ old('jenis') }}" placeholder="Hardware">
                        @error('jenis')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- jumlah material --}}
                    <div class="mb-3">
                        <label for="jumlah_material" class="form-label">Jumlah Material</label>
                        <input type="text" class="form-control" id="jumlah_material" name="jumlah_material" value="{{ old('jumlah_material') }}" placeholder="10">
                        @error('jumlah_material')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                        {{-- total biaya --}}
                        <div class="mb-3">
                            <label for="total_biaya" class="form-label">Total Biaya Material</label>
                            <input type="text" class="form-control" id="total_biaya" name="total_biaya" value="{{ old('total_biaya') }}" placeholder="1500000">
                            @error('total_biaya')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

{{-- TANGGAL PEMBELIAN MATERIAL --}}
                    <div class="mb-3">
                            <label for="tanggal_pembelian" class="form-label">Tanggal Pembelian Material</label>
                            <input type="date" class="form-control" id="tanggal_pembelian" name="tanggal_pembelian" placeholder="2022-10-02">
                            @error('tanggal_pembelian')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- STATUS PEMBAYARAN --}}
                    <div class="mb-3">
                            <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                            <input type="text" class="form-control" id="status_pembayaran" name="status_pembayaran" placeholder="Belum Dibayar">
                            @error('status_pembayaran')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    {{-- STATUS BARANG --}}
                    <div class="mb-3">
                            <label for="status_material" class="form-label">Status Material</label>
                            <input type="text" class="form-control" id="status_material" name="status_material" placeholder="Tidak Sesuai Pesanan">
                            @error('status_material')
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