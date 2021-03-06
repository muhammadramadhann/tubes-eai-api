<?php

use App\Http\Controllers\Auth\LoginController as Login;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Web\PengajuanController as PengajuanView;
use App\Http\Controllers\Web\ApplicantViewController as ApplicantView;
use App\Http\Controllers\Web\AttendanceViewController as AttendanceView;
use App\Http\Controllers\Web\DashboardController as Dashboard;
use App\Http\Controllers\Web\EmployeeViewController as EmployeeView;
use App\Http\Controllers\Web\OffworkViewController as OffworkView;
use App\Http\Controllers\Web\PencairanController;
use App\Http\Controllers\Web\PenggajianController;
use App\Http\Controllers\Web\ResignViewController as ResignView;
use App\Http\Controllers\Web\MaterialController;
use App\Http\Controllers\Web\ProductionReportController;
use App\Http\Controllers\Web\ProductionRequestController;
use App\Http\Controllers\Web\DemandsController;
use App\Http\Controllers\Web\DataprodukController;
use App\Http\Controllers\Web\SalesReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [Login::class, 'index'])->name('login');
    Route::post('/login', [Login::class, 'authentication'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [Dashboard::class, 'index']);

    // human capital | karyawan
    Route::prefix('/karyawan')->group(function () {
        Route::get('/', [EmployeeView::class, 'index'])->name('karyawan');
        Route::get('/create', [EmployeeView::class, 'create'])->name('karyawan.create');
        Route::post('/create', [EmployeeView::class, 'store'])->name('karyawan.create');
        Route::get('{id}/update', [EmployeeView::class, 'edit'])->name('karyawan.edit');
        Route::put('{id}/update', [EmployeeView::class, 'update'])->name('karyawan.update');
        Route::delete('{id}/delete', [EmployeeView::class, 'destroy'])->name('karyawan.delete');
    });

    // human capital | pelamar
    Route::prefix('/pelamar')->group(function () {
        Route::get('/', [ApplicantView::class, 'index'])->name('pelamar');
        Route::get('/create', [ApplicantView::class, 'create'])->name('pelamar.create');
        Route::post('/create', [ApplicantView::class, 'store'])->name('pelamar.create');
        Route::get('{id}/update', [ApplicantView::class, 'edit'])->name('pelamar.edit');
        Route::put('{id}/update', [ApplicantView::class, 'update'])->name('pelamar.update');
        Route::delete('{id}/delete', [ApplicantView::class, 'destroy'])->name('pelamar.delete');
    });

    // human capital | absensi
    Route::prefix('/absensi')->group(function () {
        Route::get('/', [AttendanceView::class, 'index'])->name('absensi');
        Route::get('/create', [AttendanceView::class, 'create'])->name('absensi.create');
        Route::post('/create', [AttendanceView::class, 'store'])->name('absensi.create');
        Route::get('{id}/update', [AttendanceView::class, 'edit'])->name('absensi.edit');
        Route::put('{id}/update', [AttendanceView::class, 'update'])->name('absensi.update');
        Route::delete('{id}/delete', [AttendanceView::class, 'destroy'])->name('absensi.delete');
    });

    // human capital | pengajuan cuti
    Route::prefix('/pengajuan-cuti')->group(function () {
        Route::get('/', [OffworkView::class, 'index'])->name('pengajuan-cuti');
        Route::get('/create', [OffworkView::class, 'create'])->name('pengajuan-cuti.create');
        Route::post('/create', [OffworkView::class, 'store'])->name('pengajuan-cuti.create');
        Route::get('{id}/update', [OffworkView::class, 'edit'])->name('pengajuan-cuti.edit');
        Route::put('{id}/update', [OffworkView::class, 'update'])->name('pengajuan-cuti.update');
        Route::delete('{id}/delete', [OffworkView::class, 'destroy'])->name('pengajuan-cuti.delete');
    });

    // human capital | resign
    Route::prefix('/resign')->group(function () {
        Route::get('/', [ResignView::class, 'index'])->name('resign');
        Route::get('/create', [ResignView::class, 'create'])->name('resign.create');
        Route::post('/create', [ResignView::class, 'store'])->name('resign.create');
        Route::get('{id}/update', [ResignView::class, 'edit'])->name('resign.edit');
        Route::put('{id}/update', [ResignView::class, 'update'])->name('resign.update');
        Route::delete('{id}/delete', [ResignView::class, 'destroy'])->name('resign.delete');
    });

    // Finance| pengajuan
    Route::prefix('/pengajuan')->group(function () {
        Route::get('/', [PengajuanView::class, 'index'])->name('pengajuan');
        Route::get('/create', [PengajuanView::class, 'create'])->name('pengajuan.create');
        Route::post('/create', [PengajuanView::class, 'store'])->name('pengajuan.create');
        Route::get('{id}/update', [PengajuanView::class, 'edit'])->name('pengajuan.edit');
        Route::put('{id}/update', [PengajuanView::class, 'update'])->name('pengajuan.update');
        Route::delete('{id}/delete', [PengajuanView::class, 'destroy'])->name('pengajuan.delete');
    });

    // Finance| pencairan
    Route::prefix('/pencairan')->group(function () {
        Route::get('/', [PencairanController::class, 'index'])->name('pencairan');
        Route::get('/create', [PencairanController::class, 'create'])->name('pencairan.create');
        Route::post('/create', [PencairanController::class, 'store'])->name('pencairan.create');
        Route::get('{id}/update', [PencairanController::class, 'edit'])->name('pencairan.edit');
        Route::put('{id}/update', [PencairanController::class, 'update'])->name('pencairan.update');
        Route::delete('{id}/delete', [PencairanController::class, 'destroy'])->name('pencairan.delete');
    });

    // Finance| penggajian
    Route::prefix('/penggajian')->group(function () {
        Route::get('/', [PenggajianController::class, 'index'])->name('penggajian');
        Route::get('/create', [PenggajianController::class, 'create'])->name('penggajian.create');
        Route::post('/create', [PenggajianController::class, 'store'])->name('penggajian.create');
        Route::get('{id}/update', [PenggajianController::class, 'edit'])->name('penggajian.edit');
        Route::put('{id}/update', [PenggajianController::class, 'update'])->name('penggajian.update');
        Route::delete('{id}/delete', [PenggajianController::class, 'destroy'])->name('penggajian.delete');
    });

    // SCM | material
    Route::prefix('/material')->group(function () {
        Route::get('/', [MaterialController::class, 'index'])->name('material');
        Route::get('/create', [MaterialController::class, 'create'])->name('material.create');
        Route::post('/create', [MaterialController::class, 'store'])->name('material.create');
        Route::get('{id}/update', [MaterialController::class, 'edit'])->name('material.edit');
        Route::put('{id}/update', [MaterialController::class, 'update'])->name('material.update');
        Route::delete('{id}/delete', [MaterialController::class, 'destroy'])->name('material.delete');
    });

    // SCM | Data produk
    Route::prefix('/dataproduk')->group(function () {
        Route::get('/', [DataprodukController::class, 'index'])->name('dataproduk');
        Route::get('/create', [DataprodukController::class, 'create'])->name('dataproduk.create');
        Route::post('/create', [DataprodukController::class, 'store'])->name('dataproduk.create');
        Route::get('{id}/update', [DataprodukController::class, 'edit'])->name('dataproduk.edit');
        Route::put('{id}/update', [DataprodukController::class, 'update'])->name('dataproduk.update');
        Route::delete('{id}/delete', [DataprodukController::class, 'destroy'])->name('dataproduk.delete');
    });

    // IT | Production report
    Route::prefix('/productionreport')->group(function () {
        Route::get('/', [ProductionReportController::class, 'index'])->name('productionreport');
        Route::get('/create', [ProductionReportController::class, 'create'])->name('productionreport.create');
        Route::post('/create', [ProductionReportController::class, 'store'])->name('productionreport.create');
        Route::get('{id}/update', [ProductionReportController::class, 'edit'])->name('productionreport.edit');
        Route::put('{id}/update', [ProductionReportController::class, 'update'])->name('productionreport.update');
        Route::delete('{id}/delete', [ProductionReportController::class, 'destroy'])->name('productionreport.delete');
    });

    // IT | Production request
    Route::prefix('/productionrequest')->group(function () {
        Route::get('/', [ProductionRequestController::class, 'index'])->name('productionrequest');
        Route::get('/create', [ProductionRequestController::class, 'create'])->name('productionrequest.create');
        Route::post('/create', [ProductionRequestController::class, 'store'])->name('productionrequest.create');
        Route::get('{id}/update', [ProductionRequestController::class, 'edit'])->name('productionrequest.edit');
        Route::put('{id}/update', [ProductionRequestController::class, 'update'])->name('productionrequest.update');
        Route::delete('{id}/delete', [ProductionRequestController::class, 'destroy'])->name('productionrequest.delete');
    });

    // Marketing| permintaan barang
    Route::prefix('/demands')->group(function () {
        Route::get('/', [DemandsController::class, 'index'])->name('demands');
        Route::get('/create', [DemandsController::class, 'create'])->name('demands.create');
        Route::post('/create', [DemandsController::class, 'store'])->name('demands.create');
        Route::get('{id}/update', [DemandsController::class, 'edit'])->name('demands.edit');
        Route::put('{id}/update', [DemandsController::class, 'update'])->name('demands.update');
        Route::delete('{id}/delete', [DemandsController::class, 'destroy'])->name('demands.delete');
    });

    // Marketing| laporan penjualan
    Route::prefix('/sales_report')->group(function () {
        Route::get('/', [SalesReportController::class, 'index'])->name('sales_report');
        Route::get('/create', [SalesReportController::class, 'create'])->name('sales_report.create');
        Route::post('/create', [SalesReportController::class, 'store'])->name('sales_report.create');
        Route::get('{id}/update', [SalesReportController::class, 'edit'])->name('sales_report.edit');
        Route::put('{id}/update', [SalesReportController::class, 'update'])->name('sales_report.update');
        Route::delete('{id}/delete', [SalesReportController::class, 'destroy'])->name('sales_report.delete');
    });

    // logout
    Route::get('/logout', LogoutController::class)->name('logout');
});

Route::any('{query}', function () {
    return view('not-found');
})->where('query', '.*');
