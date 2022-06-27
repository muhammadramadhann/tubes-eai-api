@extends('layouts.base')

@section('title', 'HC | Data Absensi')

@section('content')
    <ol class="breadcrumb my-4">
        <li class="breadcrumb-item"><a href="/"><small>Dashboard</small></a></li>
        <li class="breadcrumb-item active"><small>Absensi</small></li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-md-0 mb-2">Data Absensi Karyawan</h4>
        <div>
            <a href="{{ Route('absensi.create') }}" class="btn btn-primary">Tambah Data</a>
            <a href="https://eai-easygo.herokuapp.com/api/attendance" class="btn btn-secondary">API Data</a>
        </div>
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
                        <th>Tanggal Kerja</th>
                        <th>Absen Masuk</th>
                        <th>Absen Keluar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attendances as $attendance)
                        <tr>
                            <td>{{ $attendance->id_karyawan }}</td>
                            <td>{{ Carbon\Carbon::createFromDate($attendance->tanggal_kerja)->translatedFormat('j F Y') }}</td>
                            <td>{{ Carbon\Carbon::createFromDate($attendance->absensi_masuk)->format('g:i a') }}</td>
                            <td>{{ Carbon\Carbon::createFromDate($attendance->absensi_keluar)->format('g:i a') }}</td>
                            <td>{{ $attendance->status }}</td>
                            <td>
                                <a href="{{ Route('absensi.edit', $attendance->id) }}" class="btn btn-light border btn-sm text-decoration-none mb-lg-0 mb-2">Update</a>
                                <span class="text-muted d-lg-inline d-none">|</span>
                                <form action="{{ Route('absensi.delete', $attendance->id) }}" method="POST" class="d-inline">
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