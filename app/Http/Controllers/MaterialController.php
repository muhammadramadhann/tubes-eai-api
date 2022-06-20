<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = material::orderBy('id', 'DESC')->get();
        return view('scm.read_material', ['materials' => $materials]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('scm.create_material');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_bahan_baku' => ['required'],
            'jenis_bahan_baku' => ['required'],
            'jumlah_bahan_baku' => ['required'],
            'total_biaya_bahan_baku' => ['required'],
            'tanggal_pembelian' => ['required', 'date'],
            'status_pembayaran' => ['required'],
            'status_bahan_baku' => ['required'],
        ]);

        $material = material::create($request->all());
        // $material = material::create([
        //     'nama_bahan_baku' => $request->nama_bahan_baku,
        //     'jenis_bahan_baku' => $request->jenis_bahan_baku,
        //     'jumlah_bahan_baku' => $request->jumlah_bahan_baku,
        //     'total_biaya_bahan_baku' => $request->total_biaya_bahan_baku,
        //     'tanggal_pembelian' => $request->tanggal_pembelian,
        //     'status_pembayaran' => $request->status_pembayaran,
        //     'status_bahan_baku' => $request->status_bahan_baku,
        // ]);

        if ($material) {
            return Redirect::route('material')->with('success', 'Data material berhasil ditambahkan');
        }
        return Redirect::route('material')->with('fail', 'Data material gagal ditambahkan');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material = material::where('id', $id)->first();
        return view('scm.update_material', ['material' => $material]);
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
        $request->validate([
            'nama_bahan_baku' => ['required'],
            'jenis_bahan_baku' => ['required'],
            'jumlah_bahan_baku' => ['required'],
            'total_biaya_bahan_baku' => ['required'],
            'tanggal_pembelian' => ['required', 'date'],
            'status_pembayaran' => ['required'],
            'status_bahan_baku' => ['required'],
        ]);

        $material = material::where('id', $id)->first();
        $update = $material->update($request->all());
        // $update = $material->update([
        //     'nama_bahan_baku' => $request->nama_bahan_baku,
        //     'jenis_bahan_baku' => $request->jenis_bahan_baku,
        //     'jumlah_bahan_baku' => $request->jumlah_bahan_baku,
        //     'total_biaya_bahan_baku' => $request->total_biaya_bahan_baku,
        //     'tanggal_pembelian' => $request->tanggal_pembelian,
        //     'status_pembayaran' => $request->status_pembayaran,
        //     'status_bahan_baku' => $request->status_bahan_baku,
        // ]);
        if ($update) {
            return Redirect::route('material')->with('success', 'Data material berhasil diubah');
        }

        return Redirect::route('material')->with('fail', 'Data material gagal diubah');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = material::where('id', $id)->first();
        $delete = $material->delete();
        if ($delete) {
            return Redirect::route('material')->with('success', 'Data material berhasil dihapus');
        }

        return Redirect::route('material')->with('fail', 'Data material gagal dihapus');
    }
}
