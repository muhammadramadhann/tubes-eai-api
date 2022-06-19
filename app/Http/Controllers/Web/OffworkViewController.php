<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Offwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OffworkViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offworks = Offwork::orderBy('id', 'DESC')->get();
        return view('human_capital.read_offwork', ['offworks' => $offworks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('human_capital.create_offwork');
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
            'id_karyawan' => ['required'],
            'kategori_cuti' => ['required', 'in:Cuti tahunan,Sakit,Menstruasi,Melahirkan,Lainnya'],
            'tanggal_cuti' => ['required', 'date'],
            'tanggal_kembali' => ['required', 'date'],
            'deskripsi' => ['required'],
        ]);

        $employee = Employee::find($request->id_karyawan);
        if (is_null($employee)) {
            return Redirect::route('pengajuan-cuti.create')->with('fail', 'ID Karyawan tidak ditemukan. Pastikan ID yang Anda masukkan sudah benar!');
        }

        $offwork = Offwork::create($request->all());
        if ($offwork) {
            return Redirect::route('pengajuan-cuti')->with('success', 'Data pengajuan cuti berhasil ditambahkan');
        }

        return Redirect::route('pengajuan-cuti')->with('success', 'Data pengajuan cuti gagal ditambahkan');
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
        $offwork = Offwork::where('id', $id)->first();
        return view('human_capital.update_offwork', ['offwork' => $offwork]);
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
            'id_karyawan' => ['required'],
            'kategori_cuti' => ['required', 'in:Cuti tahunan,Sakit,Menstruasi,Melahirkan,Lainnya'],
            'tanggal_cuti' => ['required', 'date'],
            'tanggal_kembali' => ['required', 'date'],
            'deskripsi' => ['required'],
            'status' => ['in:Dalam proses,Disetujui,Ditolak']
        ]);

        $employee = Employee::find($request->id_karyawan);
        if (is_null($employee)) {
            return back()->with('fail', 'ID Karyawan tidak ditemukan. Pastikan ID yang Anda masukkan sudah benar!');
        }

        $offwork = Offwork::where('id', $id)->first();
        $update = $offwork->update($request->all());
        if ($update) {
            return Redirect::route('pengajuan-cuti')->with('success', 'Data pengajuan cuti berhasil diupdate');
        }

        return Redirect::route('pengajuan-cuti')->with('fail', 'Data pengajuan cuti gagal diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offwork = Offwork::where('id', $id)->first();
        $delete = $offwork->delete();
        if ($delete) {
            return Redirect::route('pengajuan-cuti')->with('success', 'Data pengajuan cuti berhasil dihapus');
        }

        return Redirect::route('pengajuan-cuti')->with('fail', 'Data pengajuan cuti gagal dihapus');
    }
}
