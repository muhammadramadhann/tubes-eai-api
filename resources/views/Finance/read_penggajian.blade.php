@extends('layouts.base')

@section('title', 'Finance | Data Pennggajian Dana')

@section('content')
    <ol class="breadcrumb my-4">
        <li class="breadcrumb-item"><a href="/"><small>Dashboard</small></a></li>
        <li class="breadcrumb-item active"><small>Penggajian</small></li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-md-0 mb-2">Data Penggajian Dana</h4>
        <div>
            <a href="{{ Route('penggajian.create') }}" class="btn btn-primary">Tambah Data</a>
            <a href="https://eai-easygo.herokuapp.com/api/penggajian" class="btn btn-secondary">API Data</a>
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
                        <th>ID</th>
                        <th>ID Absensi</th>
                        <th>Nama Karyawan</th>
                        <th>Divisi</th>
                        <th>Hari Masuk</th>
                        <th>Hari Cuti</th>
                        <th>Gaji Perhari</th>
                        <th>Gaji Total</th>
                        <th>Tanggal Penggajian</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penggajian as $gaji)
                        <tr>
                            <td>{{ $gaji->id}}</td>
                            <td>{{ $gaji->id_absensi}}</td>
                            <td>{{ $gaji->nama_karyawan}}</td>
                            <td>{{ $gaji->divisi}}</td>
                            <td>{{ $gaji->hari_masuk}}</td>
                            <td>{{ $gaji->hari_cuti}}</td>
                            <td>{{ $gaji->gaji_perhari}}</td>
                            <td>{{ $gaji->gaji_total}}</td>
                            <td>{{ Carbon\Carbon::createFromDate($gaji->tanggal_penggajian)->translatedFormat('j F Y') }}</td>
                            <td>
                                <a href="{{ Route('penggajian.edit', $gaji->id) }}" class="btn btn-light border btn-sm text-decoration-none mb-lg-0 mb-2">Update</a>
                                <span class="text-muted d-lg-inline d-none">|</span>
                                <form action="{{ Route('penggajian.delete', $gaji->id) }}" method="POST" class="d-inline">
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