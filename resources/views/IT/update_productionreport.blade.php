@extends('layouts.base')

@section('title',  'IT Production | Update Data Production Report')

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
            <form action="{{ Route('productionreport.update', $productionsr->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                  <section id="personal-data" class="mb-4">
                    <h5 class="fw-bold">Data production report</h5>
                    <p class="text-muted"><small>Isi seluruh data production report</small></p>
                    <div class="mb-3">
                        <label for="id_produksi" class="form-label">ID produksi</label>
                        <input type="text" class="form-control" id="id_produksi" name="id_produksi" value="{{ $productionsr->id_produksi}}" placeholder="1**">
                        @error('id_produksi')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-7 col-12 mb-md-0 mb-3">
                            <label for="status_produksi" class="form-label">Status Produksi</label>
                            <select class="form-select" id="status_produksi" name="status_produksi" aria-label="Default select example">
                                <option selected disabled>-- Pilih status --</option>
                                <option @if ($productionsr->status_produksi == "Success") @selected(true) @endif value="Success">Success</option>
                                <option @if ($productionsr->status_produksi == "Failed") @selected(true) @endif value="Failed">Failed</option>
                            </select>
                            @error('status_produksi')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="judul_laporan" class="form-label">Judul laporan</label>
                        <input type="text" class="form-control" id="judul_laporan" name="judul_laporan"  value="{{ $productionsr->judul_laporan}}" placeholder="Laporan pembuatan ...">
                        @error('judul_laporan')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="biaya_produksi" class="form-label">Biaya produksi</label>
                        <input type="integer" class="form-control" id="biaya_produksi" name="biaya_produksi" value="{{ $productionsr->biaya_produksi}}" placeholder="19***">
                        @error('biaya_produksi')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="lampiran" class="form-label">Lampiran</label>
                        <input type="file" class="form-control" id="lampiran" name="lampiran">
                            @error('lampiran')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea style="height: 100px" class="form-control" id="keterangan" name="keterangan" placeholder="Isi keterangan ...">{{ $productionsr->keterangan}}</textarea>
                        @error('keterangan')
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