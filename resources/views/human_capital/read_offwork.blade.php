@extends('layouts.base')

@section('title', 'HC | Data Pengajuan Cuti')

@section('content')
    <ol class="breadcrumb my-4">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item active">Human Resource - Pengajuan Cuti</li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-3">
        <h3 class="fw-bold mb-md-0 mb-2">Data Pengajuan Cuti</h3>
        <a href="" class="btn btn-white bg-light border">Tambah Data</a>
    </div>
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
                            <td>{{ $offwork['id_karyawan'] }}</td>
                            <td>{{ $offwork['kategori_cuti'] }}</td>
                            <td>{{ Illuminate\Support\Carbon::createFromDate($offwork['tanggal_cuti'])->translatedFormat('j F Y') }}</td>
                            <td>{{ Illuminate\Support\Carbon::createFromDate($offwork['tanggal_kembali'])->translatedFormat('j F Y') }}</td>
                            <td>{{ (strtotime($offwork['tanggal_kembali']) - strtotime($offwork['tanggal_cuti'])) / (60 * 60 * 24) }} Hari</td>
                            <td>{{ $offwork['status'] }}</td>
                            <td>
                                <a href="update/{{ $offwork['id'] }}" class="btn btn-warning text-white me-2 mb-lg-0 mb-2"><i class="fas fa-edit"></i></a>
                                <a href="" class="btn btn-danger text-white"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection