<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\demans;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class DemansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demans = demans::all();
        return response()->json([
            'status' => 'success',
            'message' => 'List data permintaan barang',
            'data' => $demans  
        ], Response::HTTP_OK);
        //
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
            // 'id_permintaan' => ['required'],
            'nama_produk' => ['required'],
            'jumlah_produk' => ['required'],
            'status_produk' => ['required', 'in:Diproses,Dikemas,Dikirim,Diterima'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        
        try {
            $demans = demans::create($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Data permintaan barang berhasil ditambahkan',
                'data' => $demans
            ], Response::HTTP_CREATED);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data permintaan barang gagal ditambahkan',
                'error' => $exception->errorInfo
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $demans = demans::find($id);

        if (is_null($demans)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data permintaan barang tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Detail data permintaan barang',
            'data' => $demans
        ], Response::HTTP_OK);
        //
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
        $demans = demans::find($id);

        if (is_null($demans)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data permintaan barang tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        $validator = Validator::make($request->all(), [
            // 'id_permintaan' => ['required'],
            'nama_produk' => ['required'],
            'jumlah_produk' => ['required'],
            'status_produk' => ['required', 'in:Diproses,Dikemas,Dikirim,Diterima'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $demans->update($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Data permintaan barang berhasil diupdate',
                'data' => $demans
            ], Response::HTTP_OK);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data permintaan barang gagal diupdate',
                'error' => $exception->errorInfo
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $demans = demans::find($id);

        if (is_null($demans)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data permintaan barang tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }
        try {
            $demans->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data permintaan barang berhasil dihapus',
            ], Response::HTTP_OK);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data permintaan barang gagal dihapus',
                'error' => $exception->errorInfo
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        //
    }
}
