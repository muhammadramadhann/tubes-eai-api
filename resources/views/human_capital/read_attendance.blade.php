@extends('layouts.base')

@section('title', 'HC | Data Absensi')

@section('content')
    <ol class="breadcrumb my-4">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item active">Human Resource - Absensi</li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-3">
        <h3 class="fw-bold mb-md-0 mb-2">Data Absensi</h3>
        <a href="" class="btn btn-white bg-light border">Tambah Data</a>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>ID Karyawan</th>
                        <th>Absensi Masuk</th>
                        <th>Absensi Keluar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attendances as $attendance)
                        <tr>
                            <td>{{ Illuminate\Support\Carbon::createFromDate($attendance['tanggal_kerja'])->translatedFormat('j F Y') }}</td>
                            <td>{{ $attendance['id_karyawan'] }}</td>
                            <td>{{ $attendance['absensi_masuk'] }}</td>
                            <td>{{ $attendance['absensi_keluar'] }}</td>
                            <td>{{ $attendance['status'] }}</td>
                            <td>
                                <a href="update/{{ $attendance['id'] }}" class="btn btn-warning text-white me-2 mb-lg-0 mb-2"><i class="fas fa-edit"></i></a>
                                <a href="" class="btn btn-danger text-white"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection