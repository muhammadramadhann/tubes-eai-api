<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuans = Pengajuan::orderBy('id', 'DESC')->get();
        return view('Finance.read_pengajuan', ['pengajuans' => $pengajuans]);
    }

    public function create()
    {
        return view('Finance.create_pengajuan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pegawai' => 'required',
            'divisi' => 'required',  'in:Marketing,Finance,IT Team,SCM,HC',
            'proposal' => 'mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp',
            'tanggal_mengajukan' => 'required', 'date',
            'status_pengajuan' => 'required', 'in:Tertunda,Diterima,Diproses,Disetujui,Ditolak'
            ]);

        $file = $request->file('proposal');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'asset';
        $file->move($tujuan_upload,$nama_file);

        $pengajuan = Pengajuan::create([
            'nama_pegawai' => $request->nama_pegawai,
            'divisi' => $request->divisi,
            'proposal' => $nama_file,
            'tanggal_mengajukan' => $request->tanggal_mengajukan,
            'status_pengajuan' => $request->status_pengajuan
        ]);

        if ($pengajuan) {
            return Redirect::route('pengajuan')->with('success', 'Data pengajuan berhasil ditambahkan');
        }
        return Redirect::route('pengajuan')->with('fail', 'Data pengajuan gagal ditambahkan');
    }
    public function edit($id)
    {
        $pengajuan = Pengajuan::where('id', $id)->first();
        return view('Finance.update_pengajuan', ['pengajuan' => $pengajuan]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pegawai' => ['required'],
            'divisi' => ['required',  'in:Marketing,Finance,IT Team,SCM,HC'],
            'proposal' => ['mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp'],
            'tanggal_mengajukan' => ['required', 'date'],
            'status_pengajuan' => ['required', 'in:Tertunda,Diterima,Diproses,Disetujui,Ditolak']
            ]);

        $file = $request->file('proposal');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'asset';
        $file->move($tujuan_upload,$nama_file);

        $pengajuan = Pengajuan::where('id', $id)->first();
        $update = $pengajuan->update([
            'nama_pegawai' => $request->nama_pegawai,
            'divisi' => $request->divisi,
            'proposal' => $nama_file,
            'tanggal_mengajukan' => $request->tanggal_mengajukan,
            'status_pengajuan' => $request->status_pengajuan
        ]);
        if ($update) {
            return Redirect::route('pengajuan')->with('success', 'Data pengajuan berhasil diubah');
        }
        return Redirect::route('pengajuan')->with('fail', 'Data pengajuan gagal diubah');
    }

    public function destroy($id)
    {
        $pengajuan = Pengajuan::where('id', $id)->first();
        $delete = $pengajuan->delete();
        if ($delete) {
            return Redirect::route('pengajuan')->with('success', 'Data pengajuan berhasil dihapus');
        }

        return Redirect::route('pengajuan')->with('fail', 'Data pengajuan gagal dihapus');
    }
}
