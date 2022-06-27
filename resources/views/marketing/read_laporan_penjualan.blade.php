@extends('layouts.base')

@section('title', 'Marketing | Data Laporan Penjualan')

@section('content')
    <ol class="breadcrumb my-4">
        <li class="breadcrumb-item"><a href="/"><small>Dashboard</small></a></li>
        <li class="breadcrumb-item active"><small>Laporan Penjualan</small></li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-md-0 mb-2">Data Laporan Penjualan</h4>
        <div>
            <a href="{{ Route('sales_report.create') }}" class="btn btn-primary">Tambah Data</a>
            <a href="https://eai-easygo.herokuapp.com/api/salesreport" class="btn btn-secondary">API Data</a>
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
                        <th>Tanggal Penjualan</th>
                        <th>Harga Produk</th>
                        <th>Jumlah Penjualan</th>
                        <th>Total Pendapatan</th>
                        <th>Strategi</th>
                        <th>Status Target</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales_report as $sales_report)
                        <tr>
                            <td>{{ $sales_report->id}}</td>
                            <td>{{ Carbon\Carbon::createFromDate($sales_report->tanggal_penjualan)->translatedFormat('j F Y') }}</td>
                            <td>{{ $sales_report->harga_produk}}</td>
                            <td>{{ $sales_report->jumlah_penjualan}}</td>
                            <td>{{ $sales_report->total_pendapatan}}</td>
                            <td>{{ $sales_report->strategi}}</td>
                            <td>{{ $sales_report->status_target}}</td>
                            <td>
                                <a href="{{ Route('sales_report.edit', $sales_report->id) }}" class="btn btn-light border btn-sm text-decoration-none mb-lg-0 mb-2">Update</a>
                                <span class="text-muted d-lg-inline d-none">|</span>
                                <form action="{{ Route('sales_report.delete', $sales_report->id) }}" method="POST" class="d-inline">
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