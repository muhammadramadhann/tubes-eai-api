<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\salesreport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SalesReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales_report = salesreport::orderBy('id', 'DESC')->get();
        return view('marketing.read_laporan_penjualan', ['sales_report' => $sales_report]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marketing.create_laporan_penjualan');
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
            'tanggal_penjualan' => ['required', 'date'],
            'harga_produk' => ['required'],
            'jumlah_penjualan' => ['required'],
            'strategi' => ['required'],
            'status_target' => ['required', 'in:Tercapai,Tidak tercapai']
            ]);

        $sales_report = salesreport::create([
            'tanggal_penjualan' => $request->tanggal_penjualan,
            'harga_produk' => $request->harga_produk,
            'jumlah_penjualan' => $request->jumlah_penjualan,
            'total_pendapatan' => ($request->harga_produk * $request->jumlah_penjualan),
            'strategi' => $request->strategi,
            'status_target' => $request->status_target
        ]);
        if ($sales_report) {
            return Redirect::route('sales_report')->with('success', 'Data laporan penjualan berhasil ditambahkan');
        }
        return Redirect::route('sales_report')->with('fail', 'Data laporan penjualan gagal ditambahkan');
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
        $sales_report = salesreport::where('id', $id)->first();
        return view('marketing.update_laporan_penjualan', ['sales_report' => $sales_report]);
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
            'tanggal_penjualan' => ['required','date'],
            'harga_produk' => ['required'],
            'jumlah_penjualan' => ['required'],
            'strategi' => ['required'],
            'status_target' => ['required', 'in:Tercapai,Tidak tercapai']
        ]);
        $sales_report= salesreport::where('id', $id)->first();
        $update = $sales_report->update([
            'tanggal_penjualan' => $request->tanggal_penjualan,
            'harga_produk' => $request->harga_produk,
            'jumlah_penjualan' => $request->jumlah_penjualan,
            'total_pendapatan' => ($request->harga_produk * $request->jumlah_penjualan),
            'strategi' => $request->strategi,
            'status_target' => $request->status_target
        ]);
        if ($update) {
            return Redirect::route('sales_report')->with('success', 'Data laporan penjualan berhasil diubah');
        }
        return Redirect::route('sales_report')->with('fail', 'Data laporan penjualan gagal diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sales_report = salesreport::where('id', $id)->first();
        $delete = $sales_report->delete();
        if ($delete) {
            return Redirect::route('sales_report')->with('success', 'Data laporan penjualan berhasil dihapus');
        }

        return Redirect::route('sales_report')->with('fail', 'Data laporan penjualan gagal dihapus');
    }
}
