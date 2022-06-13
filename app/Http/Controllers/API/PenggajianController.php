<?php

namespace App\Http\Controllers\API;
use App\Models\Penggajian;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class PenggajianController extends Controller
{
    public function index()
    {
        $pencairan= Penggajian::all();
        return response()->json([
            'status' => 'success',
            'message' => 'List Data Penggajian Karyawan',
            'data' => $pencairan
        ], Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_absensi' => ['required'],
            'nama_karyawan' => ['required'],
            'divisi' => ['required', 'in:Human Resource,IT Team,Marketing,SCM,Finance'],
            'hari_masuk' => ['required'],
            'hari_cuti' => ['required'],
            'gaji_perhari' => ['required'],
            'gaji_total' => ['required'],
            'tanggal_penggajian' => ['required', 'date'],
            'bukti' => ['required']
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        try {
            $penggajian = Penggajian::create($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Data Penggajian Berhasil Ditambahkan',
                'data' => $penggajian 
            ], Response::HTTP_CREATED);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data Penggajian Gagal Ditambahkan',
                'error' => $exception->errorInfo
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function tampilkan($id)
    {
        $penggajian = Penggajian::find($id);

        if (is_null($penggajian)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data Penggajian Tidak Ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data Pencairan Dana Ditemukan',
            'data' => $penggajian 
        ], Response::HTTP_OK);
    }

    public function hapus($id)
    {
        $penggajian  = Penggajian::find($id);

        if (is_null( $penggajian )) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data Penggajian Tidak Ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }
        try {
            $penggajian ->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data Penggajian Berhasil Dihapus',
            ], Response::HTTP_NO_CONTENT);
            
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data Penggajian Gagal Dihapus',
                'error' => $exception->errorInfo
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateData(Request $request, $id)
    {
        $penggajian = Penggajian::find($id);
        if (is_null($penggajian)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data penggajian tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        $validator = Validator::make($request->all(), [
            'id_absensi' => ['required'],
            'nama_karyawan' => ['required'],
            'divisi' => ['required', 'in:Human Resource,IT Team,Marketing,SCM,Finance'],
            'hari_masuk' => ['required'],
            'hari_cuti' => ['required'],
            'gaji_perhari' => ['required'],
            'gaji_total' => ['required'],
            'tanggal_penggajian' => ['required', 'date'],
            'bukti' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $penggajian->update($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Data penggajian berhasil diupdate',
                'data' => $penggajian
            ], Response::HTTP_OK);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data penggajian gagal diupdate',
                'error' => $exception->errorInfo
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    

}
