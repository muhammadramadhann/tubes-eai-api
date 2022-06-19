<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EmployeeViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('id', 'DESC')->get();
        return view('human_capital.read_employee', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('human_capital.create_employee');
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
            'nama' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required', 'date'],
            'jenis_kelamin' => ['required', 'in:Pria,Wanita'],
            'status_pernikahan' => ['required', 'in:Menikah,Lajang'],
            'email' => ['required', 'email:dns'],
            'nomor_hp' => ['required'],
            'alamat' => ['required'],
            'tanggal_bergabung' => ['required', 'date'],
            'divisi' => ['required', 'in:Marketing,Finance,IT,SCM,HC'],
        ]);

        $employee = Employee::create($request->all());
        if ($employee) {
            return Redirect::route('karyawan')->with('success', 'Data karyawan berhasil ditambahkan');
        }

        return Redirect::route('karyawan')->with('fail', 'Data karyawan gagal ditambahkan');
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
        $employee = Employee::where('id', $id)->first();
        return view('human_capital.update_employee', ['employee' => $employee]);
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
            'nama' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required', 'date'],
            'jenis_kelamin' => ['required', 'in:Pria,Wanita'],
            'status_pernikahan' => ['required', 'in:Menikah,Lajang'],
            'email' => ['required', 'email:dns'],
            'nomor_hp' => ['required'],
            'alamat' => ['required'],
            'tanggal_bergabung' => ['required', 'date'],
            'divisi' => ['required', 'in:Marketing,Finance,IT,SCM,HC'],
            'status' => ['required', 'in:Aktif,Resign'],
        ]);

        $employee = Employee::where('id', $id)->first();
        $update = $employee->update($request->all());
        if ($update) {
            return Redirect::route('karyawan')->with('success', 'Data karyawan berhasil diupdate');
        }

        return Redirect::route('karyawan')->with('fail', 'Data karyawan gagal diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::where('id', $id)->first();
        $delete = $employee->delete();
        if ($delete) {
            return Redirect::route('karyawan')->with('success', 'Data karyawan berhasil dihapus');
        }

        return Redirect::route('karyawan')->with('fail', 'Data karyawan gagal dihapus');
    }
}
