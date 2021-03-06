@extends('layouts.base')

@section('title', 'SCM | Data Produk')

@section('content')
    <ol class="breadcrumb my-4">
        <li class="breadcrumb-item"><a href="/"><small>Dashboard</small></a></li>
        <li class="breadcrumb-item active"><small>Data Produk</small></li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-md-0 mb-2">Data Produk</h4>
        <div>
            <a href="{{ Route('dataproduk.create') }}" class="btn btn-primary">Tambah Data</a>
            <a href="https://eai-easygo.herokuapp.com/api/dataproduk" class="btn btn-secondary">API Data</a>
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
                        <th>Nama Produk</th>
                        <th>Ketersediaan Produk</th>
                        <th>Jumlah Stock</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- INI BELUM BENER YA --}}
                    @foreach ($dataproduks as $dataproduk)
                        <tr>
                            <td>{{ $dataproduk->id }}</td>
                            <td>{{ $dataproduk->nama_produk }}</td>
                            <td>{{ $dataproduk->ketersediaan_produk }}</td>
                            <td>{{ $dataproduk->jumlah_stok }}</td>
                            <td>
                                <a href="{{ Route('dataproduk.edit', $dataproduk->id) }}" class="btn btn-light border btn-sm text-decoration-none mb-lg-0 mb-2">Update</a>
                                <span class="text-muted d-lg-inline d-none">|</span>
                                <form action="{{ Route('dataproduk.delete', $dataproduk->id) }}" method="POST" class="d-inline">
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