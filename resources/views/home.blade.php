@extends('layouts.base')

@section('title', 'Home')

@section('content')
    <div class="row my-4">
        <div class="col-12">
            <div class="card shadow-sm p-3">
                <div class="card-body" style="color:#AE431E;">
                    <h3 class="fw-bold mb-3">Selamat Datang, {{ Auth::user()->name }}!</h3>
                    <span >{{ Carbon\Carbon::now()->translatedFormat('l, j F Y'); }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4 text-center shadow-sm">
                <div class="card-body" style="background-color:#E0D8B0; color :#AE431E">
                    <h2 class="fw-bold">100</h2>
                    <span>Total Karyawan</span>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between" >
                    <a class="small stretched-link" href="" style="color:#AE431E">View Details</a>
                    <div class="small"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4 text-center shadow-sm">
                <div class="card-body" style="background-color:#FCFFE7; color :#AE431E">
                    <h2 class="fw-bold">12</h2>
                    <span>Pengajuan Biaya</span>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small stretched-link" href="" style="color:#AE431E">View Details</a>
                    <div class="small"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4 text-center shadow-sm">
                <div class="card-body" style="background-color:#DEA057; color :#FFFF">
                    <h2 class="fw-bold">24</h2>
                    <span>Jumlah Material</span>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small stretched-link" href="" style="color:#AE431E">View Details</a>
                    <div class="small"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4 text-center shadow-sm">
                <div class="card-body" style="background-color:#CE9461; color :#FFFF">
                    <h2 class="fw-bold">12</h2>
                    <span>Rencana Produksi</span>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small stretched-link" href="" style="color:#AE431E">View Details</a>
                    <div class="small"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header py-3 fw-bold" style="color:#AE431E">Data Karyawan</div>
        <div class="card-body">
            <table id="datatablesSimple" style="color:#AE431E">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection