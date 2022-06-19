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
                        <label for="nama_material" class="form-label">Nama Material</label>
                        <input type="text" class="form-control" id="nama_material" name="nama_material" placeholder="Nama Material" value="{{ $material->nama_bahan_baku }}">
                        @error('nama_material')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    {{-- <div class="row mb-3">
                        <div class="col-md-7 col-12 mb-md-0 mb-3">
                            <label for="divisi" class="form-label">Divisi</label>
                            <select class="form-select" id="divisi" name="divisi" aria-label="Default select example">
                                <option selected disabled>-- Pilih divisi --</option>
                                <option @if ($pengajuan->divisi == "Marketing") @selected(true) @endif value="Marketing">Marketing</option>
                                <option @if ($pengajuan->divisi == "Finance") @selected(true) @endif value="Finance">Finance</option>
                                <option @if ($pengajuan->divisi == "IT") @selected(true) @endif value="IT Team">IT</option>
                                <option @if ($pengajuan->divisi == "SCM") @selected(true) @endif value="SCM">SCM</option>
                                <option @if ($pengajuan->divisi == "HC") @selected(true) @endif value="HC">HC</option>
                            </select>
                            @error('divisi')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}

                        
        </div>
    </div>
@endsection