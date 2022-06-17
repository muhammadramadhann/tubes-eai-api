<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = Attendance::all();
        return response()->json([
            'status' => 'success',
            'message' => 'List data absensi karyawan',
            'data' => $attendances
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_karyawan' => ['required'],
            'tanggal_kerja' => ['required', 'date'],
            'absensi_masuk' => ['required'],
            'deskripsi' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $employee = Employee::find($request->id_karyawan);
        if (is_null($employee)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'ID karyawan tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        try {
            $attendance = Attendance::create($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Absensi berhasil diinput dan akan diproses untuk diverifikasi',
                'data' => $attendance
            ], Response::HTTP_CREATED);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Absensi gagal ditambahkan',
                'error' => $exception->errorInfo
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attendance = Attendance::find($id);
        if (is_null($attendance)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data absensi tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Detail absensi',
            'data' => $attendance
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $attendance = Attendance::find($id);
        if (is_null($attendance)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data absensi tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        $validator = Validator::make($request->all(), [
            'id_karyawan' => ['required'],
            'tanggal_kerja' => ['required', 'date'],
            'absensi_masuk' => ['required'],
            'absensi_keluar' => ['required'],
            'deskripsi' => ['required'],
            'status' => ['in:Dalam verifikasi,Sudah diverifikasi,Absensi tidak valid']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $employee = Employee::find($request->id_karyawan);
        if (is_null($employee)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'ID karyawan tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        try {
            $attendance->update($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Data absensi berhasil diupdate',
                'data' => $attendance
            ], Response::HTTP_CREATED);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data absensi gagal diupdate',
                'error' => $exception->errorInfo
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attendance = Attendance::find($id);
        if (is_null($attendance)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data absensi tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        try {
            $attendance->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data absensi berhasil dihapus',
            ], Response::HTTP_OK);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data absensi gagal dihapus',
                'error' => $exception->errorInfo
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
