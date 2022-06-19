<?php

namespace App\Http\Controllers\Web;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Models\Penggajian;
use Illuminate\Http\Request;

class PenggajianController extends Controller
{
    public function index()
    {
        $penggajian = Penggajian::orderBy('id', 'DESC')->get();
        return view('Finance.read_penggajian', ['penggajian' =>  $penggajian ]);
    }

    public function create()
    {
        return view('Finance.create_penggajian');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_absensi' => ['required'],
            'nama_karyawan' => ['required'],
            'divisi' => ['required', 'in:Marketing,Finance,IT Team,SCM,HC'],
            'hari_masuk' => ['required'],
            'hari_cuti' => ['required'],
            'tanggal_penggajian' => ['required', 'date']
            ]);


        $penggajian = Penggajian::create([
            'id_absensi' => $request->id_absensi,
            'nama_karyawan' => $request->nama_karyawan,
            'divisi' => $request->divisi,
            'hari_masuk' => $request->hari_masuk,
            'hari_cuti' => $request->hari_cuti,
            'gaji_perhari' => $request->gaji_perhari,
            'gaji_total' => ($request->hari_masuk * $request->gaji_perhari) - ($request->hari_cuti * $request->gaji_perhari),
            'tanggal_penggajian' => $request->tanggal_penggajian
        ]);

        if ($penggajian) {
            return Redirect::route('penggajian')->with('success', 'Data penggajian berhasil ditambahkan');
        }
        return Redirect::route('penggajian')->with('fail', 'Data penggajian gagal ditambahkan');
    }
    public function edit($id)
    {
        $penggajian = Penggajian::where('id', $id)->first();
        return view('Finance.update_penggajian', ['penggajian' => $penggajian]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_absensi' => ['required'],
            'nama_karyawan' => ['required'],
            'divisi' => ['required', 'in:Marketing,Finance,IT Team,SCM,HC'],
            'hari_masuk' => ['required'],
            'hari_cuti' => ['required'],
            'tanggal_penggajian' => ['required', 'date']
            ]);



        $penggajian= Penggajian::where('id', $id)->first();
        $update = $penggajian->update([
            'id_absensi' => $request->id_absensi,
            'nama_karyawan' => $request->nama_karyawan,
            'divisi' => $request->divisi,
            'hari_masuk' => $request->hari_masuk,
            'hari_cuti' => $request->hari_cuti,
            'gaji_perhari' => $request->gaji_perhari,
            'gaji_total' => ($request->hari_masuk * $request->gaji_perhari) - ($request->hari_cuti * $request->gaji_perhari),
            'tanggal_penggajian' => $request->tanggal_penggajian
        ]);
        if ($update) {
            return Redirect::route('penggajian')->with('success', 'Data penggajian berhasil diubah');
        }
        return Redirect::route('penggajian')->with('fail', 'Data penggajian gagal diubah');
    }

    public function destroy($id)
    {
        $penggajian = Penggajian::where('id', $id)->first();
        $delete = $penggajian->delete();
        if ($delete) {
            return Redirect::route('penggajian')->with('success', 'Data penggajian berhasil dihapus');
        }

        return Redirect::route('penggajian')->with('fail', 'Data penggajian gagal dihapus');
    }
}
