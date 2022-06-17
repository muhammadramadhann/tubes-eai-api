<?php

use App\Http\Controllers\Auth\LoginController as Login;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Web\DashboardController as Dashboard;
use App\Http\Controllers\Web\EmployeeViewController as EmployeeView;
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

    // human capital | read
    Route::prefix('/karyawan')->group(function () {
        Route::get('/', [EmployeeView::class, 'index'])->name('karyawan');
        Route::get('/create', [EmployeeView::class, 'create'])->name('karyawan.create');
        Route::post('/create', [EmployeeView::class, 'store'])->name('karyawan.create');
        Route::get('{id}/update', [EmployeeView::class, 'edit'])->name('karyawan.edit');
        Route::put('{id}/update', [EmployeeView::class, 'update'])->name('karyawan.update');
        Route::delete('{id}/delete', [EmployeeView::class, 'destroy'])->name('karyawan.delete');
    });

    // logout
    Route::get('/logout', LogoutController::class)->name('logout');
});
