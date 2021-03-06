@extends('layouts.base')

@section('title', 'Marketing | Update Data Permintaan Barang')

@section('content')
    <ol class="breadcrumb my-4">
    <li class="breadcrumb-item"><a href="/"><small>Dashboard</small></a></li>
        <li class="breadcrumb-item active"><a href="/demands"><small>Permintaan Barang</small></a></li>
        <li class="breadcrumb-item active"><small>Update Data Permintaan Barang</small></li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-5">
        <h4 class="fw-bold mb-md-0 mb-2">Update Data Permintaan Barang</h4>
    </div>
    <div class="row mb-5">
        <div class="col-lg-7 col-12">
            <form action="{{ Route('demands.update', $demands->id) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                  <section id="personal-data" class="mb-4">
                    <h5 class="fw-bold">Data Permintaan Barang</h5>
                    <p class="text-muted"><small>Isi seluruh data permintaan barang</small></p>
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ $demands->nama_produk}}" placeholder="Nama Produk">
                        @error('nama_produk')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_produk" class="form-label">Jumlah Produk</label>
                        <input type="integer" class="form-control" id="jumlah_produk" name="jumlah_produk" value="{{ $demands->jumlah_produk}}">
                        @error('jumlah_produk')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" value="{{ $demands->deskripsi}}" name="deskripsi">
                        @error('deskripsi')
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