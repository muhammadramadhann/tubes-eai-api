@extends('layouts.base')

@section('title', 'SCM | Update Data Material')

@section('content')
    <ol class="breadcrumb my-4">
        <li class="breadcrumb-item"><a href="/"><small>Dashboard</small></a></li>
        <li class="breadcrumb-item active"><a href="/material"><small>Material</small></a></li>
        <li class="breadcrumb-item active"><small>Update Data Material</small></li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-5">
        <h4 class="fw-bold mb-md-0 mb-2">Update Data Material</h4>
    </div>
    <div class="row mb-5">
        <div class="col-lg-6 col-12">
            <form action="{{ Route('material.update', $material->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <section id="data-material" class="mb-4">
                    <h5 class="fw-bold">Data Material</h5>
                    <p class="text-muted"><small>Isi seluruh data material</small></p>
                    <div class="mb-3">
                        <label for="nama_bahan_baku" class="form-label">Nama Material</label>
                        <input type="text" class="form-control" id="nama_bahan_baku" name="nama_bahan_baku" value="{{ $material->nama_bahan_baku }}" placeholder="Kerangka GPS">
                        @error('nama_bahan_baku')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- jenis material --}}
                    <div class="mb-3">
                        <label for="jenis_bahan_baku" class="form-label">Jenis Material</label>
                        <input type="text" class="form-control" id="jenis_bahan_baku" name="jenis_bahan_baku" value="{{ $material->jenis_bahan_baku }}" placeholder="Hardware">
                        @error('jenis_bahan_baku')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- jumlah material --}}
                    <div class="mb-3">
                        <label for="jumlah_bahan_baku" class="form-label">Jumlah Material</label>
                        <input type="text" class="form-control" id="jumlah_bahan_baku" name="jumlah_bahan_baku" value="{{ $material->jumlah_bahan_baku }}" placeholder="10">
                        @error('jumlah_bahan_baku')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- total biaya --}}
                    <div class="mb-3">
                        <label for="total_biaya_bahan_baku" class="form-label">Total Biaya Material</label>
                        <input type="text" class="form-control" id="total_biaya_bahan_baku" name="total_biaya_bahan_baku" value="{{ $material->total_biaya_bahan_baku }}" placeholder="1500000">
                        @error('total_biaya_bahan_baku')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- TANGGAL PEMBELIAN MATERIAL --}}
                    <div class="mb-3">
                        <label for="tanggal_pembelian" class="form-label">Tanggal Pembelian Material</label>
                        <input type="date" class="form-control" id="tanggal_pembelian" name="tanggal_pembelian" value="{{ $material->tanggal_pembelian }}" placeholder="2022-10-02">
                        @error('tanggal_pembelian')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- STATUS PEMBAYARAN --}}
                    <div class="mb-3">
                        <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                        <input type="text" class="form-control" id="status_pembayaran" name="status_pembayaran" value="{{ $material->status_pembayaran }}" placeholder="Belum Dibayar">
                        @error('status_pembayaran')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- STATUS BARANG --}}
                    <div class="mb-3">
                        <label for="status_bahan_baku" class="form-label">Status Material</label>
                        <input type="text" class="form-control" id="status_bahan_baku" name="status_bahan_baku" value="{{ $material->status_bahan_baku }}" placeholder="Tidak Sesuai Pesanan">
                        @error('status_bahan_baku')
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