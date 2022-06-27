@extends('layouts.base')

@section('title', 'IT Production | Data Production Report')

@section('content')
    <ol class="breadcrumb my-4">
        <li class="breadcrumb-item"><a href="/"><small>Dashboard</small></a></li>
        <li class="breadcrumb-item active"><small>IT Production</small></li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-md-0 mb-2">Data Production Report</h4>
        <div>
            <a href="{{ Route('productionreport.create') }}" class="btn btn-primary">Tambah Data</a>
            <a href="https://eai-easygo.herokuapp.com/api/production-report" class="btn btn-secondary">API Data</a>
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
                        <th>ID Produksi</th>
                        <th>Status Produksi</th>
                        <th>Judul Laporan</th>
                        <th>Biaya Produksi</th>
                        <th>Lampiran</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productionsr as $prod)
                        <tr>
                            <td>{{ $prod->id}}</td>
                            <td>{{ $prod->id_produksi}}</td>
                            <td>{{ $prod->status_produksi}}</td>
                            <td>{{ $prod->judul_laporan}}</td>
                            <td>{{ $prod->biaya_produksi}}</td>
                            <td><iframe src="/asset/{{$prod->lampiran}}" class="card-img-top"  alt="..."></iframe></td>
                            <td>{{ $prod->keterangan}}</td>
                            <td>
                                <a href="{{ Route('productionreport.edit', $prod->id) }}" class="btn btn-light border btn-sm text-decoration-none mb-lg-0 mb-2">Update</a>
                                <span class="text-muted d-lg-inline d-none">|</span>
                                <form action="{{ Route('productionreport.delete', $prod->id) }}" method="POST" class="d-inline">
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