<?php

use App\Http\Controllers\API\ApplicantController;
use App\Http\Controllers\API\AttendanceController;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\DemansController;
use App\Http\Controllers\API\reportController;
use App\Http\Controllers\API\OffworkController;
use App\Http\Controllers\API\MaterialController;
use App\Http\Controllers\API\ProductionPlanController;
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

//Permintaan barang
Route::get('/demans', [DemansController::class, 'index']);
Route::post('/demans', [DemansController::class, 'store']);
Route::get('/demans/{id}', [DemansController::class, 'show']);
Route::put('/demans/{id}', [DemansController::class, 'update']);
Route::delete('/demans/{id}', [DemansController::class, 'destroy']);

//Laporan Penjualan
Route::get('/salesreport', [reportController::class, 'index']);
Route::post('/salesreport', [reportController::class, 'store']);
Route::get('/salesreport/{id}', [reportController::class, 'show']);
Route::put('/salesreport/{id}', [reportController::class, 'update']);
Route::delete('/salesreport/{id}', [reportController::class, 'destroy']);

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

// rencana produksi
Route::apiResource('/production-plan', [ProductionPlanController::class]);
