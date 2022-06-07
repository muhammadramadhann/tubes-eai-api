<?php

use App\Http\Controllers\API\ApplicantController;
use App\Http\Controllers\API\AttendanceController;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\OffworkController;
use App\Http\Controllers\API\MaterialController;
use App\Http\Controllers\API\PencairanController;
use App\Http\Controllers\API\PengajuanController;
use App\Http\Controllers\API\PenggajianController;
use App\Http\Controllers\API\ProductionPlanController;
use App\Http\Controllers\API\ProductionReportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// karyawan
Route::get('/employee', [EmployeeController::class, 'index']);
Route::post('/employee', [EmployeeController::class, 'store']);
Route::get('/employee/{id}', [EmployeeController::class, 'show']);
Route::put('/employee/{id}', [EmployeeController::class, 'update']);
Route::delete('/employee/{id}', [EmployeeController::class, 'destroy']);

// pelamar/calon karyawan baru
Route::get('/applicant', [ApplicantController::class, 'index']);
Route::post('/applicant', [ApplicantController::class, 'store']);
Route::get('/applicant/{id}', [ApplicantController::class, 'show']);
Route::put('/applicant/{id}', [ApplicantController::class, 'update']);
Route::delete('/applicant/{id}', [ApplicantController::class, 'destroy']);

// absensi karyaan
Route::get('/attendance', [AttendanceController::class, 'index']);
Route::post('/attendance', [AttendanceController::class, 'store']);
Route::get('/attendance/{id}', [AttendanceController::class, 'show']);
Route::put('/attendance/{id}', [AttendanceController::class, 'update']);
Route::delete('/attendance/{id}', [AttendanceController::class, 'destroy']);

// pengajuan cuti karyawan
Route::get('/offwork', [OffworkController::class, 'index']);
Route::post('/offwork', [OffworkController::class, 'store']);
Route::get('/offwork/{id}', [OffworkController::class, 'show']);
Route::put('/offwork/{id}', [OffworkController::class, 'update']);
Route::delete('/offwork/{id}', [OffworkController::class, 'destroy']);

// pembelian bahan baku
Route::get('/material', [MaterialController::class, 'index']);
Route::post('/material', [MaterialController::class, 'store']);
Route::get('/material/{id}', [MaterialController::class, 'show']);
Route::put('/material/{id}', [MaterialController::class, 'update']);
Route::delete('/material/{id}', [MaterialController::class, 'destroy']);

// laporan produksi
Route::Apiresource('/production-report', ProductionReportController::class);

// rencana produksi
Route::apiResource('/production-plan', ProductionPlanController::class);

// pengajuan dana
Route::get('/pengajuan', [PengajuanController::class, 'index']);
Route::post('/pengajuan', [PengajuanController::class, 'create']);
Route::get('/pengajuan/{id}', [PengajuanController::class, 'tampilkan']);
Route::put('/pengajuan/{id}', [PengajuanController::class, 'updateData']);
Route::delete('/pengajuan/{id}', [PengajuanController::class, 'hapus']);

//pencairan dana
Route::get('/pencairan', [PencairanController::class, 'index']);
Route::post('/pencairan', [PencairanController::class, 'create']);
Route::get('/pencairan/{id}', [PencairanController::class, 'tampilkan']);
Route::put('/pencairan/{id}', [PencairanController::class, 'updateData']);
Route::delete('/pencairan/{id}', [PencairanController::class, 'hapus']);

//penggajian karyawan
Route::get('/penggajian', [PenggajianController::class, 'index']);
Route::post('/penggajian', [PenggajianController::class, 'create']);
Route::get('/penggajian/{id}', [PenggajianController::class, 'tampilkan']);
Route::put('/penggajian/{id}', [PenggajianController::class, 'updateData']);
Route::delete('/penggajian/{id}', [PenggajianController::class, 'hapus']);
