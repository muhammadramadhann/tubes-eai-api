<?php

use App\Http\Controllers\Auth\LoginController as Login;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Web\ApplicantViewController as ApplicantView;
use App\Http\Controllers\Web\AttendanceViewController as AttendanceView;
use App\Http\Controllers\Web\DashboardController as Dashboard;
use App\Http\Controllers\Web\EmployeeViewController as EmployeeView;
use App\Http\Controllers\Web\OffworkViewController as OffworkView;
use App\Http\Controllers\Web\ResignViewController as ResignView;
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

    // logout
    Route::get('/logout', LogoutController::class)->name('logout');
});

Route::any('{query}', function () {
    return view('not-found');
})->where('query', '.*');
