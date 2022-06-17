<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ApplicantViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicants = Applicant::orderBy('id', 'DESC')->get();
        return view('human_capital.read_applicant', ['applicants' => $applicants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('human_capital.create_applicant');
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
            'pendidikan_terakhir' => ['required'],
            'pilihan_divisi' => ['required', 'in:Marketing,Finance,IT,SCM,HC'],
        ]);

        $applicant = Applicant::create($request->all());
        if ($applicant) {
            return Redirect::route('pelamar')->with('success', 'Data pelamar berhasil ditambahkan');
        }

        return Redirect::route('pelamar')->with('fail', 'Data pelamar gagal ditambahkan');
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
        $applicant = Applicant::where('id', $id)->first();
        return view('human_capital.update_applicant', ['applicant' => $applicant]);
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
            'pendidikan_terakhir' => ['required'],
            'pilihan_divisi' => ['required', 'in:Marketing,Finance,IT,SCM,HC'],
            'status' => ['in:Dalam seleksi,Lolos,Tidak lolos'],
        ]);

        $applicant = Applicant::where('id', $id)->first();
        $update = $applicant->update($request->all());
        if ($update) {
            return Redirect::route('pelamar')->with('success', 'Data pelamar berhasil diupdate');
        }

        return Redirect::route('pelamar')->with('fail', 'Data pelamar gagal diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $applicant = Applicant::where('id', $id)->first();
        $delete = $applicant->delete();
        if ($delete) {
            return Redirect::route('pelamar')->with('success', 'Data pelamar berhasil dihapus');
        }

        return Redirect::route('pelamar')->with('fail', 'Data pelamar gagal dihapus');
    }
}
