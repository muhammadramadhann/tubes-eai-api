@extends('layouts.base')

@section('title', 'Finance | Data Pencairan Dana')

@section('content')
    <ol class="breadcrumb my-4">
        <li class="breadcrumb-item"><a href="/"><small>Dashboard</small></a></li>
        <li class="breadcrumb-item active"><small>Pencairan</small></li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-md-0 mb-2">Data Pencairan Dana</h4>
        <a href="{{ Route('pencairan.create') }}" class="btn btn-primary">Tambah Data</a>
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
                        <th>ID Pengajuan</th>
                        <th>Jumlah Dana Keluar</th>
                        <th>Tanggal Pencairan</th>
                        <th>Keterangan</th>
                        <th>Bukti</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pencairans as $cair)
                        <tr>
                            <td>{{ $cair->id}}</td>
                            <td>{{ $cair->id_pengajuan}}</td>
                            <td>{{ $cair->jml_dana_keluar}}</td>
                            <td>{{ Carbon\Carbon::createFromDate($cair->tanggal_pencairan)->translatedFormat('j F Y') }}</td>
                            <td>{{ $cair->keterangan}}</td>
                            <td><img src="/asset/{{$cair->bukti}}" class="card-img-top"  alt="..."></td>
                            <td>
                                <a href="{{ Route('pencairan.edit', $cair->id) }}" class="btn btn-light border btn-sm text-decoration-none mb-lg-0 mb-2">Update</a>
                                <span class="text-muted d-lg-inline d-none">|</span>
                                <form action="{{ Route('pencairan.delete', $cair->id) }}" method="POST" class="d-inline">
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