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
        <div class="col-lg-7 col-12">
            {{-- route blm buat --}}
            <form action="{{ Route('material.update', $applicant->id) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <section id="data-material" class="mb-4">
                    <h5 class="fw-bold">Data Material</h5>
                    <p class="text-muted"><small>Isi seluruh data material</small></p>
                    <div class="mb-3">

                        {{-- nama material --}}
                        <label for="nama_material" class="form-label">Nama Material</label>
                        <input type="text" class="form-control" id="nama_material" name="nama_material" value="{{ $material->nama_bahan_baku }}" placeholder="Kerangka GPS">
                        @error('nama_material')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    {{-- jenis material --}}
                    <div class="row mb-3">
                        <div class="col-md-7 col-12 mb-md-0 mb-3">
                            <label for="jenis" class="form-label">Jenis Material</label>
                            <input type="text" class="form-control" id="jenis" name="jenis" value="{{ $material->jenis_bahan_baku}}" placeholder="Hardware">
                            @error('jenis')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        </div>

                        {{-- jumlah material --}}
                    <div class="row mb-3">
                        <div class="col-md-5 col-12">
                            <label for="jumlah_material" class="form-label">Jumlah Material</label>
                            {{-- oldnya blm buat --}}
                            <input type="text" class="form-control" id="jumlah_material" name="jumlah_material" value="{{$material->jumlah_bahan_baku}}" placeholder="10">
                            @error('jumlah_material')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                            </div>
    
                            {{-- total biaya --}}
                            <div class="row mb-3">
                            <div class="col-md-5 col-12">
                                <label for="total_biaya" class="form-label">Total Biaya Material</label>
                                {{-- old nya blm buat --}}
                                <input type="text" class="form-control" id="total_biaya" name="total_biaya" value="{{$material->total_biaya_bahan_baku}}" placeholder="1500000">
                                @error('total_biaya')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
    
    {{-- TANGGAL PEMBELIAN MATERIAL --}}
                        <div class="row mb-3">
                            <div class="col-md-7 col-12 mb-md-0 mb-3">
                                <label for="tanggal_pembelian" class="form-label">Tanggal Pembelian Material</label>
                                <input type="date" class="form-control" id="tanggal_pembelian" name="tanggal_pembelian" value="{{$material->tanggal_pembelian}}" placeholder="2022-10-02">
                                @error('tanggal_pembelian')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        </div>
    
                        {{-- STATUS PEMBAYARAN --}}
                        <div class="row mb-3">
                            <div class="col-md-7 col-12 mb-md-0 mb-3">
                                <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                                <input type="text" class="form-control" id="status_pembayaran" name="status_pembayaran" value="{{$material->status_pembayaran}}" placeholder="Belum Dibayar">
                                @error('status_pembayaran')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
    
                        {{-- STATUS BARANG --}}
                        <div class="row mb-3">
                            <div class="col-md-7 col-12 mb-md-0 mb-3">
                                <label for="status_material" class="form-label">Status Material</label>
                                <input type="text" class="form-control" id="status_material" name="status_material" value="{{$material->status_bahan_baku}}" placeholder="Tidak Sesuai Pesanan">
                                @error('status_material')
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
        </div>
    </div>
@endsection