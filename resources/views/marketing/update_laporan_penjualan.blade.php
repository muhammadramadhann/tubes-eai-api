@extends('layouts.base')

@section('title', 'Marketing | Update Data Laporan Penjualan')

@section('content')
    <ol class="breadcrumb my-4">
    <li class="breadcrumb-item"><a href="/"><small>Dashboard</small></a></li>
        <li class="breadcrumb-item active"><a href="/sales_report"><small>Laporan Penjualan</small></a></li>
        <li class="breadcrumb-item active"><small>Update Data Laporan Penjualan</small></li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-5">
        <h4 class="fw-bold mb-md-0 mb-2">Update Data Laporan Penjualan</h4>
    </div>
    <div class="row mb-5">
        <div class="col-lg-7 col-12">
            <form action="{{ Route('sales_report.update', $sales_report->id) }}" method="POST"  enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                    <section id="personal-data" class="mb-4">
                    <h5 class="fw-bold">Data Laporan Penjualan</h5>
                    <p class="text-muted"><small>Isi seluruh data laporan penjualan</small></p>
                    <div class="row mb-3">
                        <div class="col-md-7 col-12 mb-md-0 mb-3">
                            <label for="tanggal_penjualan" class="form-label">Tanggal Penjualan</label>
                            <input type="date" class="form-control" id="tanggal_penjualan" name="tanggal_penjualan" value="{{$sales_report->tanggal_penjualan}}" placeholder="2022-10-03">
                            @error('tanggal_penjualan')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div> 
                    <div class="mb-3">
                        <label for="harga_produk" class="form-label">Harga Produk</label>
                        <input type="integer" class="form-control" id="harga_produk" name="harga_produk" value="{{$sales_report->harga_produk}}" placeholder="200000">
                        @error('harga_produk')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_penjualan" class="form-label">Jumlah Penjualan</label>
                        <input type="integer" class="form-control" id="jumlah_penjualan" name="jumlah_penjualan" value="{{$sales_report->jumlah_penjualan}}" placeholder="5">
                        @error('jumlah_penjualan')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_penjualan" class="form-label">Jumlah Penjualan</label>
                        <input type="integer" class="form-control" id="jumlah_penjualan" name="jumlah_penjualan" value="{{$sales_report->jumlah_penjualan}}" placeholder="5">
                        @error('jumlah_penjualan')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="strategi" class="form-label">Strategi</label>
                        <input type="number" class="form-control" id="strategi" name="strategi" value="{{$sales_report->strategi}}">
                        @error('strategi')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-7 col-12 mb-md-0 mb-3">
                            <label for="status_target" class="form-label">Status Target</label>
                            <select class="form-select" id="status_target" name="status_target" aria-label="Default select example">
                            <option selected disabled>-- Pilih status target --</option>
                                <option @if ($sales_report->status_target == "Tercapai") @selected(true) @endif value="Tercapai">Tercapai</option>
                                <option @if ($sales_report->status_target == "Tidak tercapai") @selected(true) @endif value="Tidak tercapai">Tidak tercapai</option>
                            </select>
                            @error('status_target')
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