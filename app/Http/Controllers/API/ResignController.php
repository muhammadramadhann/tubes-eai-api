<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Resign;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ResignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resigns = Resign::all();
        return response()->json([
            'status' => 'success',
            'message' => 'List data resign karyawan',
            'data' => $resigns
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
            'alasan_resign' => ['required', 'in:Melanjutkan pendidikan,Perubahan karir,Permasalahan gaji,Keluarga,Lainnya'],
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
            $resign = Resign::create($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Permohonan resign berhasil diajukan dan akan ditinjau',
                'data' => $resign
            ], Response::HTTP_CREATED);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Permohonan resign gagal ditambahkan',
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
        $resign = Resign::find($id);
        if (is_null($resign)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data permohonan resign tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Detail permohonan resign cuti',
            'data' => $resign
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
        $resign = Resign::find($id);
        if (is_null($resign)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data permohonan resign tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        $validator = Validator::make($request->all(), [
            'id_karyawan' => ['required'],
            'alasan_resign' => ['required', 'in:Melanjutkan pendidikan,Perubahan karir,Permasalahan gaji,Keluarga,Lainnya'],
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
            $resign->update($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Data permohonan resign berhasil diupdate',
                'data' => $resign
            ], Response::HTTP_CREATED);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data permohonan resign gagal diupdate',
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
        $resign = Resign::find($id);
        if (is_null($resign)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data permohonan resign tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        try {
            $resign->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data permohonan resign berhasil dihapus',
            ], Response::HTTP_OK);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data permohonan resign gagal dihapus',
                'error' => $exception->errorInfo
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
