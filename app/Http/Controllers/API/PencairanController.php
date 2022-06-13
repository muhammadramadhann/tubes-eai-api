<?php

namespace App\Http\Controllers\API;
use App\Models\Pencairan;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;


class PencairanController extends Controller
{
    public function index()
    {
        $pencairan= Pencairan::all();
        return response()->json([
            'status' => 'success',
            'message' => 'List Data Pencairan Dana',
            'data' => $pencairan
        ], Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_pengajuan' => ['required'],
            'jml_dana_keluar' => ['required'],
            'tanggal_pencairan' => ['required', 'date'],
            'keterangan' => ['required'],
            'bukti' => ['required']
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        try {
            $pencairan = Pencairan::create($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Data Pencairan Dana Berhasil Ditambahkan',
                'data' => $pencairan
            ], Response::HTTP_CREATED);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data Pencairan Dana Gagal Ditambahkan',
                'error' => $exception->errorInfo
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function tampilkan($id)
    {
        $pencairan = Pencairan::find($id);

        if (is_null($pencairan)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data Pencairan Dana Tidak Ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data Pencairan Dana Ditemukan',
            'data' => $pencairan
        ], Response::HTTP_OK);
    }

    public function hapus($id)
    {
        $pencairan = Pencairan::find($id);

        if (is_null( $pencairan)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data Pencairan Dana Tidak Ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }
        try {
            $pencairan->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data Pencairan Dana Berhasil Dihapus',
            ], Response::HTTP_NO_CONTENT);
            
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data Pencairan Dana Gagal Dihapus',
                'error' => $exception->errorInfo
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateData(Request $request, $id)
    {
        $pencairan = Pencairan::find($id);
        if (is_null($pencairan)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data pencairan tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        $validator = Validator::make($request->all(), [
            'id_pengajuan' => ['required'],
            'jml_dana_keluar' => ['required'],
            'tanggal_pencairan' => ['required', 'date'],
            'keterangan' => ['required'],
            'bukti' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $pencairan->update($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Data pencairan berhasil diupdate',
                'data' => $pencairan
            ], Response::HTTP_OK);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data pencairan gagal diupdate',
                'error' => $exception->errorInfo
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }    

}
