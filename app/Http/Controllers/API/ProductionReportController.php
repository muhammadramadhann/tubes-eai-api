<?php

namespace App\Http\Controllers\API;

use App\Models\ProductionReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProductionPlanResource;
use Illuminate\Support\Facades\Validator;

class ProductionReportController extends Controller
{
    //
    public function index()
    {
        //get posts
        $report = ProductionReport::latest()->paginate(5);

        //return collection of posts as a resource
        return new ProductionPlanResource(true, 'List Data Production Report', $report);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'id_produksi'     => 'required',
            'status_produksi'   => 'required',
            'judul_laporan' => 'required',
            'biaya_produksi' => 'required',
            'lampiran' => 'required|mimes:pdf,docs',
            'keterangan' => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload file
        $file = $request->file('lampiran');
        $file->storeAs('public/file', $file->hashName());

        //create post
        $report = ProductionReport::create([
            'lampiran'     => $file->hashName(),
            'id_produksi'     => $request->id_produksi,
            'status_produksi'   => $request->status_produksi,
            'judul_laporan' => $request->judul_laporan,
            'biaya_produksi' => $request->biaya_produksi,
            'keterangan' => $request->keterangan
        ]);

        //return response
        return new ProductionPlanResource(true, 'Data Laporan Berhasil Ditambahkan!', $report);
    }

    public function show($id)
    {
        $prod = ProductionReport::find($id);
        //return single post as a resource
        return new ProductionPlanResource(true, 'Data Laporan Produksi Ditemukan!', $prod);
    }

    public function update(Request $request, $id)
    {
        $prod = ProductionReport::find($id);

        //define validator
        $validator = Validator::make($request->all(), [
            'id_produksi'     => 'required',
            'status_produksi'   => 'required',
            'judul_laporan' => 'required',
            'biaya_produksi' => 'required',
            'lampiran' => 'mimes:pdf,docs',
            'keterangan' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //check if image is not empty
        if ($request->hasFile('lampiran')) {

            //upload file
            $lampiran = $request->file('image');
            $lampiran->storeAs('public/file', $lampiran->hashName());

            //delete old file
            Storage::delete('public/file/'.$prod->lampiran);

            //update post with new image
            $prod->update([
                'lampiran'     => $file->hashName(),
                'id_produksi'     => $request->id_produksi,
                'status_produksi'   => $request->status_produksi,
                'judul_laporan' => $request->judul_laporan,
                'biaya_produksi' => $request->biaya_produksi,
                'keterangan' => $request->keterangan
            ]);

        } else {

            //update post without image
            $prod->update([
                'id_produksi'     => $request->id_produksi,
                'status_produksi'   => $request->status_produksi,
                'judul_laporan' => $request->judul_laporan,
                'biaya_produksi' => $request->biaya_produksi,
                'keterangan' => $request->keterangan
            ]);
        }


        return new ProductionPlanResource(true, 'Data Laporan Produksi Berhasil Diubah!', $prod);
    }

    public function destroy($id)
    {
        //delete column
        $prod = ProductionReport::find($id);
        // Storage::delete('public/file/'.$prod->lampiran);
        $prod->delete();

        //return response
        return new ProductionPlanResource(true, 'Data Laporan Produksi Berhasil Dihapus!', null);
    }

}