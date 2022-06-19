<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Pencairan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PencairanController extends Controller
{
    public function index()
    {
        $pencairans = Pencairan::orderBy('id', 'DESC')->get();
        return view('Finance.read_pencairan', ['pencairans' => $pencairans]);
    }

    public function create()
    {
        return view('Finance.create_pencairan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pengajuan' => 'required',
            'jml_dana_keluar' => 'required',
            'tanggal_pencairan' =>  'required', 'date',
            'keterangan' => 'required', 
            'bukti' => 'mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp'
            ]);

        $file = $request->file('bukti');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'asset';
        $file->move($tujuan_upload,$nama_file);

        $pencairans = Pencairan::create([
            'id_pengajuan' =>$request->id_pengajuan,
                'jml_dana_keluar' =>$request->jml_dana_keluar,
                'tanggal_pencairan' =>$request->tanggal_pencairan,
                'keterangan' =>$request->keterangan, 
                'bukti' =>$nama_file
        ]);

        if ($pencairans) {
            return Redirect::route('pencairan')->with('success', 'Data pencairan berhasil ditambahkan');
        }
            return Redirect::route('pencairan')->with('fail', 'Data pencairan gagal ditambahkan');
    }
    public function edit($id)
    {
        $pencairan = Pencairan::where('id', $id)->first();
        return view('Finance.update_pencairan', ['pencairan' => $pencairan]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pengajuan' => 'required',
            'jml_dana_keluar' => 'required',
            'tanggal_pencairan' =>  'required', 'date',
            'keterangan' => 'required', 
            'bukti' => 'mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp'
            ]);

            $file = $request->file('bukti');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'asset';
            $file->move($tujuan_upload,$nama_file);
    
        $pencairan = Pencairan::where('id', $id)->first();
        $update = $pencairan->update([
                'id_pengajuan' =>$request->id_pengajuan,
                'jml_dana_keluar' =>$request->jml_dana_keluar,
                'tanggal_pencairan' =>$request->tanggal_pencairan,
                'keterangan' =>$request->keterangan, 
                'bukti' =>$nama_file
        ]);
        if ($update) {
            return Redirect::route('pencairan')->with('success', 'Data pencairan berhasil diubah');
        }
        return Redirect::route('pencairan')->with('fail', 'Data pencairan gagal diubah');
    }

    public function destroy($id)
    {
        $pencairan = Pencairan::where('id', $id)->first();
        $delete = $pencairan->delete();
        if ($delete) {
            return Redirect::route('pencairan')->with('success', 'Data pencairan berhasil dihapus');
        }

        return Redirect::route('pencairan')->with('fail', 'Data pencairan gagal dihapus');
    }
}
