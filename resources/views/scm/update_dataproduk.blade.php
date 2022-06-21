@extends('layouts.base')

@section('title', 'SCM | Update Data Produk')

@section('content')
    <ol class="breadcrumb my-4">
        <li class="breadcrumb-item"><a href="/"><small>Dashboard</small></a></li>
        <li class="breadcrumb-item active"><a href="/dataproduk"><small>Data Produk</small></a></li>
        <li class="breadcrumb-item active"><small>Update Data Produk</small></li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-5">
        <h4 class="fw-bold mb-md-0 mb-2">Update Data Produk</h4>
    </div>
    <div class="row mb-5">
        <div class="col-lg-7 col-12">
            {{-- route blm buat --}}
            <form action="{{ Route('dataproduk.update', $applicant->id) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <section id="data-material" class="mb-4">
                    <h5 class="fw-bold">Data Produk</h5>
                    <p class="text-muted"><small>Isi seluruh data produk</small></p>
                    <div class="mb-3">

                {{-- nama produk --}}
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{$dataproduk->nama_produk}}" placeholder="GPS Pro">
                        @error('nama_produk')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- ketersediaan produk --}}
                <div class="mb-3">
                        <label for="ketersediaan_produk" class="form-label">Ketersediaan Produk</label>
                        <input type="text" class="form-control" id="ketersediaan_produk" name="ketersediaan_produk" value="{{$dataproduk->ketersediaan_produk}}" placeholder="Tersedia">
                        @error('ketersediaan_produk')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- jumlah stok --}}
                    <div class="mb-3">
                        <label for="jumlah_stok" class="form-label">Jumlah Stock</label>
                        <input type="text" class="form-control" id="jumlah_stok" name="jumlah_stok" value="{{$dataproduk->jumlah_stok}}" placeholder="10">
                        @error('jumlah_stok')
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