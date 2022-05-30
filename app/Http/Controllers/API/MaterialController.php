<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\material;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $material = material::all();
        return response()->json([
            'status' => 'success',
            'message' => 'List data pembelian bahan baku',
            'data' => $material
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
            'id_pembelian_bahan_baku' => ['required', 'in:Marketing,Finance,IT,SCM,HC'],
            'quotation' => ['required', 'in:'],
            'status_bahan_baku' => ['required', 'in:Dikemas,Diproses,Dikirim,Diterima'],
            'status_pembayaran' => ['required', 'in:Belum Dibayar, Sudah Dibayar'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $material = material::create($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Data pembelian bahan baku berhasil ditambahkan',
                'data' => $material
            ], Response::HTTP_CREATED);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data pembelian bahan baku gagal ditambahkan',
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

        $material = material::find($id);

        if (is_null($material)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data pembelian bahan baku tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Detail data pembelian bahan baku',
            'data' => $material
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
        $material = material::find($id);

        if (is_null($material)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data pembelian bahan baku tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        $validator = Validator::make($request->all(), [
            'id_pembelian_bahan_baku' => ['required', 'in:Marketing,Finance,IT,SCM,HC'],
            'quotation' => ['required', 'in:'],
            'status_bahan_baku' => ['required', 'in:Dikemas,Diproses,Dikirim,Diterima'],
            'status_pembayaran' => ['required', 'in:Belum Dibayar, Sudah Dibayar'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $material->update($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Data pembelian bahan baku berhasil diupdate',
                'data' => $material
            ], Response::HTTP_OK);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data pembelian bahan baku gagal diupdate',
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

        $material = material::find($id);

        if (is_null($material)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data pembelian bahan baku tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        try {
            $material->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data pembelian bahan baku berhasil dihapus',
            ], Response::HTTP_OK);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data pembelian bahan baku gagal dihapus',
                'error' => $exception->errorInfo
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
