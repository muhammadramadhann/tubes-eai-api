@extends('layouts.base')

@section('title', 'SCM | Data Material')

@section('content')
    <ol class="breadcrumb my-4">
        <li class="breadcrumb-item"><a href="/"><small>Dashboard</small></a></li>
        <li class="breadcrumb-item active"><small>Material</small></li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-md-0 mb-2">Data Material</h4>
        <a href="{{ Route('material.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session('fail'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('fail') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session('success_update'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success_update') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session('fail_update'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('fail_update') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card mb-4">
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Material </th>
                        <th>Jenis Material</th>
                        <th>Jumlah Material</th>
                        <th>Total Biaya Material</th>
                        <th>Tanggal Pembelian Material</th>
                        <th>Status Pembayaran</th>
                        <th>Status Material</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- INI BELUM BENER YA --}}
                    @foreach ($materials as $material)
                        <tr>
                            <td>{{ $material->id }}</td>
                            <td>{{ $material->nama_bahan_baku }}</td>
                            <td>{{ $material->jenis_bahan_baku }}</td>
                            <td>{{ $material->jumlah_bahan_baku }}</td>
                            <td>{{ $material->total_biaya_bahan_baku }}</td>
                            <td>{{ Carbon\Carbon::createFromDate($material->tanggal_pembelian)->translatedFormat('j F Y') }}</td>
                            <td>{{ $material->status_pembayaran }}</td>
                            <td>{{ $material->status_bahan_baku }}</td>
                            <td>
                                {{-- route masi blm buat --}}
                                <a href="{{ Route('material.edit', $material->id) }}" class="btn btn-light border btn-sm text-decoration-none mb-lg-0 mb-2">Update</a>
                                <span class="text-muted d-lg-inline d-none">|</span>
                                <form action="{{ Route('material.delete', $material->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-sm text-decoration-none">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection