<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Offwork;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class OffworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offworks = Offwork::all();
        return response()->json([
            'status' => 'success',
            'message' => 'List data absensi karyawan',
            'data' => $offworks
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
            'kategori_cuti' => ['required'],
            'tanggal_cuti' => ['required', 'date'],
            'tanggal_kembali' => ['required', 'date'],
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
            $offwork = Offwork::create($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Pengajuan cuti berhasil diajukan dan akan ditinjau',
                'data' => $offwork
            ], Response::HTTP_CREATED);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Pengajuan cuti gagal ditambahkan',
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
        $offwork = Offwork::find($id);
        if (is_null($offwork)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data pengajuan cuti tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Detail pengajuan cuti',
            'data' => $offwork
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
        $offwork = Offwork::find($id);
        if (is_null($offwork)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data pengajuan cuti tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        $validator = Validator::make($request->all(), [
            'id_karyawan' => ['required'],
            'kategori_cuti' => ['required'],
            'tanggal_cuti' => ['required', 'date'],
            'tanggal_kembali' => ['required', 'date'],
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
            $offwork->update($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Data pengajuan cuti berhasil diupdate',
                'data' => $offwork
            ], Response::HTTP_CREATED);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data pengajuan cuti gagal diupdate',
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
        $offwork = Offwork::find($id);
        if (is_null($offwork)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data pengajuan cuti tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        try {
            $offwork->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data pengajuan cuti berhasil dihapus',
            ], Response::HTTP_OK);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data pengajuan cuti gagal dihapus',
                'error' => $exception->errorInfo
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
