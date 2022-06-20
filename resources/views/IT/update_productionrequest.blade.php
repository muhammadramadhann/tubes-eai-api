@extends('layouts.base')

@section('title',  'IT Production | Update Data Production Request')

@section('content')
    <ol class="breadcrumb my-4">
    <li class="breadcrumb-item"><a href="/"><small>Dashboard</small></a></li>
        <li class="breadcrumb-item active"><a href="/productionreport"><small>IT Production</small></a></li>
        <li class="breadcrumb-item active"><small>Update Data Production Request</small></li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-5">
        <h4 class="fw-bold mb-md-0 mb-2">Update Data Production Request</h4>
    </div>
    <div class="row mb-5">
        <div class="col-lg-7 col-12">
            <form action="{{ Route('productionrequest.update', $productionreq->id) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                  <section id="personal-data" class="mb-4">
                    <h5 class="fw-bold">Data production request</h5>
                    <p class="text-muted"><small>Isi seluruh data production request</small></p>

                    <div class="mb-3">
                        <label for="nama_bahan_baku" class="form-label">Nama Bahan Baku</label>
                        <input type="text" class="form-control" id="nama_bahan_baku" name="nama_bahan_baku" value="{{$productionreq->nama_bahan_baku}}" placeholder="Nama Bahan ...">
                        @error('nama_bahan_baku')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jenis_bahan_baku" class="form-label">Jenis Bahan Baku</label>
                        <input type="text" class="form-control" id="jenis_bahan_baku" name="jenis_bahan_baku" value="{{$productionreq->jenis_bahan_baku}}" placeholder="Jenis Bahan ...">
                        @error('judul_laporan')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="integer" class="form-control" id="jumlah" name="jumlah" value="{{$productionreq->jumlah}}" placeholder="Ex : 25">
                        @error('jumlah')
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