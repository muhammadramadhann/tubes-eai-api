<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Resign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ResignViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resigns = Resign::orderBy('id', 'DESC')->get();
        return view('human_capital.read_resign', ['resigns' => $resigns]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('human_capital.create_resign');
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
            'alasan_resign' => ['required', 'in:Melanjutkan pendidikan,Perubahan karir,Permasalahan gaji,Keluarga,Lainnya'],
            'deskripsi' => ['required'],
        ]);

        $employee = Employee::find($request->id_karyawan);
        if (is_null($employee)) {
            return Redirect::route('resign.create')->with('fail', 'ID Karyawan tidak ditemukan. Pastikan ID yang Anda masukkan sudah benar!');
        }

        $resign = Resign::create($request->all());
        if ($resign) {
            return Redirect::route('resign')->with('success', 'Data permohonan resign berhasil ditambahkan');
        }

        return Redirect::route('resign')->with('success', 'Data permohonan resign gagal ditambahkan');
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
        $resign = Resign::where('id', $id)->first();
        return view('human_capital.update_resign', ['resign' => $resign]);
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
            'alasan_resign' => ['required', 'in:Melanjutkan pendidikan,Perubahan karir,Permasalahan gaji,Keluarga,Lainnya'],
            'deskripsi' => ['required'],
            'status' => ['in:Dalam proses,Disetujui,Ditolak']
        ]);

        $employee = Employee::find($request->id_karyawan);
        if (is_null($employee)) {
            return back()->with('fail', 'ID Karyawan tidak ditemukan. Pastikan ID yang Anda masukkan sudah benar!');
        }

        $resign = Resign::where('id', $id)->first();
        $update = $resign->update($request->all());
        if ($update) {
            return Redirect::route('resign')->with('success', 'Data permohonan resign cuti berhasil diupdate');
        }

        return Redirect::route('resign')->with('fail', 'Data permohonan resign gagal diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resign = Resign::where('id', $id)->first();
        $delete = $resign->delete();
        if ($delete) {
            return Redirect::route('resign')->with('success', 'Data permohonan resign berhasil dihapus');
        }

        return Redirect::route('resign')->with('fail', 'Data permohonan resign gagal dihapus');
    }
}
