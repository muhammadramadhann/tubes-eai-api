<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return response()->json([
            'status' => 'success',
            'message' => 'List data karyawan',
            'data' => $employees
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
            'nama' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required', 'date'],
            'jenis_kelamin' => ['required', 'in:Pria,Wanita'],
            'status_pernikahan' => ['required', 'in:Menikah,Lajang'],
            'email' => ['required', 'email:dns'],
            'nomor_hp' => ['required'],
            'alamat' => ['required'],
            'tanggal_bergabung' => ['required', 'date'],
            'divisi' => ['required', 'in:Marketing,Finance,IT,SCM,HC'],
            'status' => ['required', 'in:Aktif,Sedang cuti,Non Aktif'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $employee = Employee::create($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Data karyawan berhasil ditambahkan',
                'data' => $employee
            ], Response::HTTP_CREATED);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data karyawan gagal ditambahkan',
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
        $employee = Employee::find($id);

        if (is_null($employee)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data karyawan tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Detail data karyawan',
            'data' => $employee
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
        $employee = Employee::find($id);

        if (is_null($employee)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data karyawan tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        $validator = Validator::make($request->all(), [
            'nama' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required', 'date'],
            'jenis_kelamin' => ['required', 'in:Pria,Wanita'],
            'status_pernikahan' => ['required', 'in:Menikah,Lajang'],
            'email' => ['required', 'email:dns'],
            'nomor_hp' => ['required'],
            'alamat' => ['required'],
            'tanggal_bergabung' => ['required', 'date'],
            'divisi' => ['required', 'in:Marketing,Finance,IT,SCM,HC'],
            'status' => ['required', 'in:Aktif,Sedang cuti,Non Aktif'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $employee->update($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Data karyawan berhasil diupdate',
                'data' => $employee
            ], Response::HTTP_OK);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data karyawan gagal diupdate',
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
        $employee = Employee::find($id);

        if (is_null($employee)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data karyawan tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        try {
            $employee->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data karyawan berhasil dihapus',
            ], Response::HTTP_NO_CONTENT);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data karyawan gagal dihapus',
                'error' => $exception->errorInfo
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
