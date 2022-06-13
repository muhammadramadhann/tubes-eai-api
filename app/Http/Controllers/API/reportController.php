<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\salesreport;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class reportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salesreport = salesreport::all();
        return response()->json([
            'status' => 'success',
            'message' => 'List laporan penjualan',
            'data' => $salesreport
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
            'tanggal_penjualan' => ['required', 'date'],
            'harga_produk' => ['required'],
            'jumlah_penjualan' => ['required'],
            'strategi' => ['required'],
            'status_target' => ['required','in:Tercapai,Tidak Tercapai'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $salesreport = salesreport::create([
                'tanggal_penjualan'=> $request->tanggal_penjualan,
                'harga_produk' => $request->harga_produk,
                'jumlah_penjualan' =>$request->jumlah_penjualan,
                'total_pendapatan'=>$request->harga_produk * $request->jumlah_penjualan,
                'strategi' =>$request->strategi,
                'status_target' =>$request->status_target
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Data laporan penjualan berhasil ditambahkan',
                'data' => $salesreport
            ], Response::HTTP_CREATED);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data laporan penjualan gagal ditambahkan',
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
        $salesreport = salesreport::find($id);

        if (is_null($salesreport)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data laporan penjualan tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Detail laporan penjualan',
            'data' => $salesreport
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
        $salesreport = salesreport::find($id);

        if (is_null($salesreport)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data laporan penjualan tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        $validator = Validator::make($request->all(), [
            'tanggal_penjualan' => ['required', 'date'],
            'harga_produk' => ['required'],
            'jumlah_penjualan' => ['required'],
            'strategi' => ['required'],
            'status_target' => ['required', 'in:Tercapai,Tidak tercapai'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $salesreport->update([
                'tanggal_penjualan'=> $request->tanggal_penjualan,
                'harga_produk' => $request->harga_produk,
                'jumlah_penjualan' =>$request->jumlah_penjualan,
                'total_pendapatan'=>$request->harga_produk * $request->jumlah_penjualan,
                'strategi' =>$request->strategi,
                'status_target' =>$request->status_target
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Data laporan penjualan berhasil diupdate',
                'data' => $salesreport
            ], Response::HTTP_OK);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data laporan penjualan gagal diupdate',
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
        $salesreport = salesreport::find($id);

        if (is_null($salesreport)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data laporan penjualan tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        try {
            $salesreport->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data laporan penjualan berhasil dihapus',
            ], Response::HTTP_OK);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data laporan penjualan gagal dihapus',
                'error' => $exception->errorInfo
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
