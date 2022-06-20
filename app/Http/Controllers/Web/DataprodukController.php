<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Dataproduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class DataprodukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataproduks = Dataproduk::orderBy('id', 'DESC')->get();
        return view('scm.read_dataproduk', ['dataproduks' => $dataproduks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('scm.create_dataproduk');
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
            'ketersediaan_produk' => ['required'],
            'jumlah_stok' => ['required'],
        ]);

        $dataproduk = Dataproduk::create($request->all());

        if ($dataproduk) {
            return Redirect::route('dataproduk')->with('success', 'Data produk berhasil ditambahkan');
        }
        return Redirect::route('dataproduk')->with('fail', 'Data produk gagal ditambahkan');
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
        $dataproduk = Dataproduk::where('id', $id)->first();
        return view('scm.update_dataproduk', ['dataproduk' => $dataproduk]);
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
            'ketersediaan_produk' => ['required'],
            'jumlah_stok' => ['required'],
        ]);

        $dataproduk = Dataproduk::where('id', $id)->first();
        $update = $dataproduk->update($request->all());
        if ($update) {
            return Redirect::route('dataproduk')->with('success', 'Data produk berhasil diubah');
        }

        return Redirect::route('dataproduk')->with('fail', 'Data produk gagal diubah');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataproduk = Dataproduk::where('id', $id)->first();
        $delete = $dataproduk->delete();
        if ($delete) {
            return Redirect::route('dataproduk')->with('success', 'Data produk berhasil dihapus');
        }

        return Redirect::route('dataproduk')->with('fail', 'Data produk gagal dihapus');
    }
}
