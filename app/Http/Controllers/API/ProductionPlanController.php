<?php

namespace App\Http\Controllers\Api;

use App\Models\ProductionPlan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProductionPlanResource;
use Carbon\Carbon;

class ProductionPlanController extends Controller
{
    //
    public function index()
    {
        $production = ProductionPlan::latest()->paginate(5);

        return new ProductionPlanResource(true, 'List Data Production Plan', $production);
    }

    public function store(Request $request)
    {
        //define validator
        $validator = Validator::make($request->all(),[
            'kegiatan_produksi' => 'required',
            'penanggung_jawab' => 'required',
            'rencana_anggaran' => 'required',
            'jenis_barang' => 'required',
            'deskripsi' => 'required',
            'tanggal_produksi' => 'required|date'
        ]);

        //check if validator fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //change str to date format
        
        // $date = $request->tanggal_produksi;
        // $newdate = Carbon::createFromFormat('m/d/Y', $date)->format('Y-m-d');

        //create post
        $post = ProductionPlan::create([
            'kegiatan_produksi' => $request->kegiatan_produksi,
            'penanggung_jawab' => $request->penanggung_jawab,
            'rencana_anggaran' => $request->rencana_anggaran,
            'jenis_barang' => $request->jenis_barang,
            'deskripsi' => $request->deskripsi,
            'tanggal_produksi' => $request->tanggal_produksi
        ]);

        return new ProductionPlanResource(true, 'Data Rencana Produksi Berhasil Ditambahkan!', $post);
    }

    public function show(ProductionPlan $id_produksi)
    {
        //return single post as a resource
        return new ProductionPlanResource(true, 'Data Rencana Produksi Ditemukan!', $id_produksi);
    }
    
}
