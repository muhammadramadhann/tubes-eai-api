<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Pengajuan;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuanDana= Pengajuan::all();
        return response()->json([
            'status' => 'success',
            'message' => 'List Data Pengajuan Dana',
            'data' => $pengajuanDana
        ], Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pegawai' => ['required'],
            'divisi' => ['required', 'in:Human Resource,IT Team,Marketing,SCM,Finance'],
            'proposal' => ['required'],
            'tanggal_mengajukan' => ['required', 'date'],
            'status_pengajuan' => ['required', 'in:Tertunda,Diterima,Diproses,Disetujui,Ditolak']
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        try {
            $danas = Pengajuan::create($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Data Pengajuan Dana Berhasil Ditambahkan',
                'data' => $danas
            ], Response::HTTP_CREATED);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data Pengajuan Dana Gagal Ditambahkan',
                'error' => $exception->errorInfo
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function tampilkan($id)
    {
        $danas = Pengajuan::find($id);

        if (is_null($danas)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data Pengajuan Dana Tidak Ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data Pengajuan Dana Ditemukan',
            'data' => $danas
        ], Response::HTTP_OK);
    }

    public function hapus($id)
    {
        $pengajuan  = Pengajuan::find($id);

        if (is_null($pengajuan )) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data Penggajian Tidak Ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }
        try {
            $pengajuan ->delete();
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
        $pengajuan = Pengajuan::find($id);
        if (is_null($pengajuan)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data pengajuan tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        $validator = Validator::make($request->all(), [
            'nama_pegawai' => ['required'],
            'divisi' => ['required', 'in:Human Resource,IT Team,Marketing,SCM,Finance'],
            'proposal' => ['required'],
            'tanggal_mengajukan' => ['required', 'date'],
            'status_pengajuan' => ['required', 'in:Tertunda,Diterima,Diproses,Disetujui,Ditolak']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $pengajuan->update($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Data pengajuan berhasil diupdate',
                'data' => $pengajuan
            ], Response::HTTP_OK);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data pengajuan gagal diupdate',
                'error' => $exception->errorInfo
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
