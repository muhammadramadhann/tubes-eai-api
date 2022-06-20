<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ProductionReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductionReportController extends Controller
{
    public function index()
    {
        $productionsr = ProductionReport::orderBy('id', 'DESC')->get();
        return view('IT.read_productionreport', ['productionsr' => $productionsr]);
    }

    public function create()
    {
        return view('IT.created_productionreport');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_produksi'     => 'required',
            'status_produksi'   => 'required',
            'judul_laporan' => 'required',
            'biaya_produksi' => 'required',
            'lampiran' => 'mimes:pdf,docs',
            'keterangan' => 'required'
            ]);

            $file = $request->file('lampiran');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'asset';
            $file->move($tujuan_upload,$nama_file); 

            $productionsr= ProductionReport::create([
                'id_produksi'     => $request->id_produksi,
                'status_produksi'   => $request->status_produksi,
                'judul_laporan' => $request->judul_laporan,
                'biaya_produksi' => $request->biaya_produksi,
                'lampiran'     => $nama_file,
                'keterangan' => $request->keterangan
        ]);

        if ( $productionsr) {
            return Redirect::route('productionreport')->with('success', 'Data production report berhasil ditambahkan');
        }
        return Redirect::route('productionreport')->with('fail', 'Data production report gagal ditambahkan');
    }
    public function edit($id)
    {
        $productionsr = ProductionReport::where('id', $id)->first();
        return view('IT.update_productionreport', ['productionsr' => $productionsr]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_produksi'     => 'required',
            'status_produksi'   => 'required',
            'judul_laporan' => 'required',
            'biaya_produksi' => 'required',
            'lampiran' => 'mimes:pdf,docs',
            'keterangan' => 'required'
            ]);

            $file = $request->file('lampiran');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'asset';
            $file->move($tujuan_upload,$nama_file); 

            $productionsr = ProductionReport::where('id', $id)->first();
            $update = $productionsr->update([
                'id_produksi'     => $request->id_produksi,
                'status_produksi'   => $request->status_produksi,
                'judul_laporan' => $request->judul_laporan,
                'biaya_produksi' => $request->biaya_produksi,
                'lampiran'     => $nama_file,
                'keterangan' => $request->keterangan
        ]);
        if ($update) {
            return Redirect::route('productionreport')->with('success', 'Data production report  berhasil diubah');
        }
        return Redirect::route('productionreport')->with('fail', 'Data production report  gagal diubah');
    }

    public function destroy($id)
    {
        $productionsr = ProductionReport::where('id', $id)->first();
        $delete = $productionsr->delete();
        if ($delete) {
            return Redirect::route('productionreport')->with('success', 'Data  production report  berhasil dihapus');
        }

        return Redirect::route('productionreport')->with('fail', 'Data  production report  gagal dihapus');
    }

}
