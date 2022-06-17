@extends('layouts.base')

@section('title', 'HC | Data Pelamar')

@section('content')
    <ol class="breadcrumb my-4">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item active">Human Resource - Pelamar</li>
    </ol>
    <hr class="mb-4">
    <div class="d-md-flex d-block justify-content-between align-items-center mb-3">
        <h3 class="fw-bold mb-md-0 mb-2">Data Pelamar</h3>
        <a href="" class="btn btn-white bg-light border">Tambah Data</a>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Pendidikan</th>
                        <th>Divisi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($applicants as $applicant)
                        <tr>
                            <td>{{ $applicant['id'] }}</td>
                            <td>{{ $applicant['nama'] }}</td>
                            <td>{{ $applicant['pendidikan_terakhir'] }}</td>
                            <td>{{ $applicant['pilihan_divisi'] }}</td>
                            <td>{{ $applicant['status'] }}</td>
                            <td>
                                <a href="update/{{ $applicant['id'] }}" class="btn btn-warning text-white me-2 mb-lg-0 mb-2"><i class="fas fa-edit"></i></a>
                                <a href="" class="btn btn-danger text-white"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection