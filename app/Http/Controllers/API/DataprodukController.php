<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Dataproduk;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;


class DataprodukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataproduk = Dataproduk::all();
        return response()->json([
            'status' => 'success',
            'message' => 'List Data Permintaan Produk',
            'data' => $dataproduk
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
            'nama_produk' => ['required'],
            'ketersediaan_produk' => ['required', 'in:Tersedia,Tidak tersedia'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $dataproduk = Dataproduk::create($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Data permintaan produk berhasil ditambahkan',
                'data' => $dataproduk
            ], Response::HTTP_CREATED);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data permintaan produk gagal ditambahkan',
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
        $dataproduk = Dataproduk::find($id);
        if (is_null($dataproduk)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data permintaan produk tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Detail data permintaan produk',
            'data' => $dataproduk
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
        $dataproduk = Dataproduk::find($id);
        if (is_null($dataproduk)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data permintaan produk tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        $validator = Validator::make($request->all(), [
            'nama_produk' => ['required'],
            'ketersediaan_produk' => ['required', 'in:Tersedia,Tidak tersedia'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $dataproduk->update($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Data permintaan produk berhasil diupdate',
                'data' => $dataproduk
            ], Response::HTTP_OK);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data permintaan produk gagal diupdate',
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
        $dataproduk = Dataproduk::find($id);
        if (is_null($dataproduk)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data permintaan produk tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        try {
            $dataproduk->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data permintaan produk berhasil dihapus',
            ], Response::HTTP_OK);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data permintaan produk gagal dihapus',
                'error' => $exception->errorInfo
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
