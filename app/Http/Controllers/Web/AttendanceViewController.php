<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AttendanceViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = Attendance::orderBy('id', 'DESC')->get();
        return view('human_capital.read_attendance', ['attendances' => $attendances]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('human_capital.create_attendance');
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
            'tanggal_kerja' => ['required', 'date'],
            'absensi_masuk' => ['required'],
            'deskripsi' => ['required'],
        ]);

        $employee = Employee::find($request->id_karyawan);
        if (is_null($employee)) {
            return Redirect::route('absensi.create')->with('fail', 'ID Karyawan tidak ditemukan. Pastikan ID yang Anda masukkan sudah benar!');
        }

        $attendance = Attendance::create($request->all());
        if ($attendance) {
            return Redirect::route('absensi')->with('success', 'Data absensi berhasil ditambahkan');
        }

        return Redirect::route('absensi')->with('success', 'Data absensi gagal ditambahkan');
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
        $attendance = Attendance::where('id', $id)->first();
        return view('human_capital.update_attendance', ['attendance' => $attendance]);
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
            'tanggal_kerja' => ['required', 'date'],
            'absensi_masuk' => ['required'],
            'deskripsi' => ['required'],
            'status' => ['required', 'in:Dalam verifikasi,Sudah diverifikasi,Absensi tidak valid']
        ]);

        $employee = Employee::find($request->id_karyawan);
        if (is_null($employee)) {
            return back()->with('fail', 'ID Karyawan tidak ditemukan. Pastikan ID yang Anda masukkan sudah benar!');
        }

        $attendance = Attendance::where('id', $id)->first();
        $update = $attendance->update($request->all());
        if ($update) {
            return Redirect::route('absensi')->with('success', 'Data absensi berhasil diupdate');
        }

        return Redirect::route('absensi')->with('fail', 'Data absensi gagal diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attendance = Attendance::where('id', $id)->first();
        $delete = $attendance->delete();
        if ($delete) {
            return Redirect::route('absensi')->with('success', 'Data absensi berhasil dihapus');
        }

        return Redirect::route('absensi')->with('fail', 'Data absensi gagal dihapus');
    }
}
