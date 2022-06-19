<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Storage;


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
            'nama_pegawai' => 'required',
            'divisi' => 'required', 'in:Human Resource,IT Team,Marketing,SCM,Finance',
            'proposal' => 'required|mimes:pdf,docs',
            'tanggal_mengajukan' => 'required', 'date',
            'status_pengajuan' => 'required', 'in:Tertunda,Diterima,Diproses,Disetujui,Ditolak'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        //upload file
        $file = $request->file('proposal');
        $file->storeAs('public/asset/', $file->hashName());

        try {
           $pengajuanDana = Pengajuan::create([
            'nama_pegawai' => $request->nama_pegawai,
            'divisi' => $request->divisi,
            'proposal' => $file->hashName(),
            'tanggal_mengajukan' => $request->tanggal_mengajukan,
            'status_pengajuan' => $request->status_pengajuan
        ]); 
            return response()->json([
                'status' => 'success',
                'message' => 'Data Pengajuan Dana Berhasil Ditambahkan',
                'data' => $pengajuanDana
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
        Storage::delete('public/asset/'.$pengajuan->lampiran);

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
            'nama_pegawai' => 'required',
            'divisi' => 'required', 'in:Human Resource,IT Team,Marketing,SCM,Finance',
            'proposal' => 'mimes:pdf,docs',
            'tanggal_mengajukan' => 'required', 'date',
            'status_pengajuan' => 'required', 'in:Tertunda,Diterima,Diproses,Disetujui,Ditolak'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            if ($request->hasFile('proposal')){
            //upload file
            $file = $request->file('proposal');
            $file->storeAs('public/asset/', $file->hashName());
              //delete old image
              Storage::delete('public/asset/'.$pengajuan->lampiran);
            
            $pengajuan->update([
                'nama_pegawai' => $request->nama_pegawai,
                'divisi' => $request->divisi,
                'proposal' => $file->hashName(),
                'tanggal_mengajukan' => $request->tanggal_mengajukan,
                'status_pengajuan' => $request->status_pengajuan
            ]); 
            return response()->json([
                'status' => 'success',
                'message' => 'Data pengajuan berhasil diupdate',
                'data' => $pengajuan
            ], Response::HTTP_OK);
        }else{
            $pengajuan->update([
                'nama_pegawai' => $request->nama_pegawai,
                'divisi' => $request->divisi,
                'tanggal_mengajukan' => $request->tanggal_mengajukan,
                'status_pengajuan' => $request->status_pengajuan
            ]); 
        }
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data pengajuan gagal diupdate',
                'error' => $exception->errorInfo
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
