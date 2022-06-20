<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ProductionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductionRequestController extends Controller
{
    public function index()
    {
        $productionreq = ProductionRequest::orderBy('id', 'DESC')->get();
        return view('IT.read_productionrequest', ['productionreq' => $productionreq]);
    }

    public function create()
    {
        return view('IT.created_productionrequest');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bahan_baku'     => ['required'],
            'jenis_bahan_baku' => ['required'],
            'jumlah' => ['required']
            ]);

        $productionreq= ProductionRequest::create([
            'nama_bahan_baku'     => $request->nama_bahan_baku,
            'jenis_bahan_baku'   => $request->jenis_bahan_baku,
            'jumlah' => $request->jumlah
        ]);

        if ( $productionreq) {
            return Redirect::route('productionrequest')->with('success', 'Data production request berhasil ditambahkan');
        }
        return Redirect::route('productionrequest')->with('fail', 'Data production request gagal ditambahkan');
    }
    public function edit($id)
    {
        $productionreq = ProductionRequest::where('id', $id)->first();
        return view('IT.update_productionrequest', ['productionreq' => $productionreq]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bahan_baku'     => ['required'],
            'jenis_bahan_baku' => ['required'],
            'jumlah' => ['required']
            ]);

        $productionreq = ProductionRequest::where('id', $id)->first();
        $update = $productionreq->update([
            'nama_bahan_baku'     => $request->nama_bahan_baku,
            'jenis_bahan_baku'   => $request->jenis_bahan_baku,
            'jumlah' => $request->jumlah
        ]);
        if ($update) {
            return Redirect::route('productionrequest')->with('success', 'Data production request berhasil diubah');
        }
        return Redirect::route('productionrequest')->with('fail', 'Data production request gagal diubah');
    }

    public function destroy($id)
    {
        $productionreq= ProductionRequest::where('id', $id)->first();
        $delete = $productionreq->delete();
        if ($delete) {
            return Redirect::route('productionrequest')->with('success', 'Data  production request  berhasil dihapus');
        }

        return Redirect::route('productionrequest')->with('fail', 'Data  production request  gagal dihapus');
    }

}