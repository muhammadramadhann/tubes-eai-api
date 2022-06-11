<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PermintaanDataProduk;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class PermintaanDataProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PermintaanDataProduk = PermintaanDataProduk::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Data Permintaan Produk',
            'data' => $PermintaanDataProduk
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
            'id_permintaan' => ['required'],
            'ketersediaan_produk' => ['required'],
            'status_pengiriman_kepada_scm' => ['required'],
            'status_produk' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $PermintaanDataProduk = PermintaanDataProduk::create($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Permintaan Data Produk Berhasil Ditambahkan',
                'data' => $PermintaanDataProduk
            ], Response::HTTP_CREATED);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Permintaan Data Produk Gagal Ditambahkan',
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
        $PermintaanDataProduk = PermintaanDataProduk::find($id);

        if (is_null($PermintaanDataProduk)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Permintaan Data Produk Tidak Ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Detail Permintaan Data Produk',
            'data' => $PermintaanDataProduk
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
        $PermintaanDataProduk = PermintaanDataProduk::find($id);

        if (is_null($PermintaanDataProduk)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Permintaan Data Produk Tidak Ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        $validator = Validator::make($request->all(), [
            'id_permintaan' => ['required'],
            'ketersediaan_produk' => ['required'],
            'status_pengiriman_kepada_scm' => ['required'],
            'status_produk' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $PermintaanDataProduk->update($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Permintaan Data Produk Berhasil Diupdate',
                'data' => $PermintaanDataProduk
            ], Response::HTTP_OK);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Permintaan Data Produk Gagal Diupdate',
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
        $PermintaanDataProduk = PermintaanDataProduk::find($id);

        if (is_null($PermintaanDataProduk)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Permintaan Data Produk Tidak Ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        try {
            $PermintaanDataProduk->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Permintaan Data Produk Berhasil Dihapus',
            ], Response::HTTP_OK);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Permintaan Data Produk Gagal Dihapus',
                'error' => $exception->errorInfo
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
