<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductionRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProductionPlanResource;
use Carbon\Carbon;

class ProductionRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $production = ProductionRequest::latest()->paginate(5);

        return new ProductionPlanResource(true, 'List Data Production Request', $production);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        //
        $validator = Validator::make($request->all(), [
            'nama_bahan_baku' => 'required',
            'jenis_bahan_baku' => 'required',
            'jumlah' => 'required',
        ]);

        //check if validator fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //change str to date format

        //create post
        $post = ProductionRequest::create([
            'nama_bahan_baku' => $request->nama_bahan_baku,
            'jenis_bahan_baku' => $request->jenis_bahan_baku,
            'jumlah' => $request->jumlah,
        ]);

        return new ProductionPlanResource(true, 'Data Permintaan Bahan Baku Berhasil Ditambahkan!', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $prod = ProductionRequest::find($id);
        //return single post as a resource
        return new ProductionPlanResource(true, 'Data Permintaan Bahan Baku Ditemukan!', $prod);
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
        //
        //define validator
        $validator = Validator::make($request->all(), [
            'nama_bahan_baku' => 'required',
            'jenis_bahan_baku' => 'required',
            'jumlah' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $prod = ProductionRequest::find($id);

        $prod->update([
            'nama_bahan_baku' => $request->nama_bahan_baku,
            'jenis_bahan_baku' => $request->jenis_bahan_baku,
            'jumlah' => $request->jumlah,
        ]);

        return new ProductionPlanResource(true, 'Data Request Berhasil Diubah!', $prod);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //delete column
        $prod = ProductionRequest::find($id);
        $prod->delete();

        //return response
        return new ProductionPlanResource(true, 'Data Request Berhasil Dihapus!', null);
    }
}
