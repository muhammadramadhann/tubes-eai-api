<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\demans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DemandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demands = demans::orderBy('id', 'DESC')->get();
        return view('marketing.read_permintaan_barang', ['demands' => $demands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marketing.create_permintaan_barang');
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
            'nama_produk' => ['required'],
            'jumlah_produk' => ['required'],
        ]);

        $demands = demans::create($request->all());
        if ($demands) {
            return Redirect::route('demands')->with('success', 'Data Permintaan Barang berhasil ditambahkan');
        }

        return Redirect::route('demands')->with('fail', 'Data Permintaan Barang gagal ditambahkan');
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
        $demands = demans::where('id', $id)->first();
        return view('marketing.update_permintaan_barang', ['demands' => $demands]);
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
            'nama_produk' => ['required'],
            'jumlah_produk' => ['required'],
        ]);
        
        $demands = demans::where('id', $id)->first();
        $update = $demands->update($request->all());
        if ($update) {
            return Redirect::route('demands')->with('success', 'Data Permintaan Barang berhasil diupdate');
        }

        return Redirect::route('demands')->with('fail', 'Data Permintaan Barang gagal diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $demands = demans::where('id', $id)->first();
        $delete = $demands->delete();
        if ($delete) {
            return Redirect::route('demands')->with('success', 'Data Permintaan Barang berhasil dihapus');
        }

        return Redirect::route('demands')->with('fail', 'Data Permintaan Barang gagal dihapus');
    }
}
