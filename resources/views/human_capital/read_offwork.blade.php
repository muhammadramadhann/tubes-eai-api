@extends('layouts.base')

@section('title', 'HC | Data Absensi')

@section('content')
    <ol class="breadcrumb my-4">
        <li class="breadcrumb-item"><a href="/"><small>Dashboard</small></a></li>
        <li class="breadcrumb-item active"><small>Pengajuan Cuti</small></li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-md-0 mb-2">Data Pengajuan Cuti Karyawan</h4>
        <a href="{{ Route('pengajuan-cuti.create') }}" class="btn btn-primary">Tambah Data</a>
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
                        <th>ID Karyawan</th>
                        <th>Kategori Cuti</th>
                        <th>Tanggal Cuti</th>
                        <th>Tanggal Kembali</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($offworks as $offwork)
                        <tr>
                            <td>{{ $offwork->id_karyawan }}</td>
                            <td>{{ $offwork->kategori_cuti }}</td>
                            <td>{{ Carbon\Carbon::createFromDate($offwork->tanggal_cuti)->translatedFormat('j F Y') }}</td>
                            <td>{{ Carbon\Carbon::createFromDate($offwork->tanggal_kembali)->translatedFormat('j F Y') }}</td>
                            <td>{{ (strtotime($offwork->tanggal_kembali) - strtotime($offwork->tanggal_cuti)) / (60 * 60 * 24) }} Hari</td>
                            <td>{{ $offwork->status }}</td>
                            <td>
                                <a href="{{ Route('pengajuan-cuti.edit', $offwork->id) }}" class="btn btn-light border btn-sm text-decoration-none mb-lg-0 mb-2">Update</a>
                                <span class="text-muted d-lg-inline d-none">|</span>
                                <form action="{{ Route('pengajuan-cuti.delete', $offwork->id) }}" method="POST" class="d-inline">
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