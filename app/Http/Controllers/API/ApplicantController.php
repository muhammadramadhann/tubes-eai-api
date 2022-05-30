<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicants = Applicant::all();
        return response()->json([
            'status' => 'success',
            'message' => 'List data pelamar',
            'data' => $applicants
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
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

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $applicant = Applicant::create($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Data pelamar berhasil ditambahkan',
                'data' => $applicant
            ], Response::HTTP_CREATED);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data pelamar gagal ditambahkan',
                'error' => $exception->errorInfo
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applicant = Applicant::find($id);

        if (is_null($applicant)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data pelamar tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Detail data pelamar',
            'data' => $applicant
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $applicant = Applicant::find($id);

        if (is_null($applicant)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data pelamar tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        $validator = Validator::make($request->all(), [
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
            'status' => ['in:Dalam proses seleksi,Lolos,Tidak lolos'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $applicant->update($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Data pelamar berhasil diupdate',
                'data' => $applicant
            ], Response::HTTP_OK);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data pelamar gagal diupdate',
                'error' => $exception->errorInfo
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $applicant = Applicant::find($id);

        if (is_null($applicant)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data pelamar tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        try {
            $applicant->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data pelamar berhasil dihapus',
            ], Response::HTTP_OK);
        } catch (QueryException $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data pelamar gagal dihapus',
                'error' => $exception->errorInfo
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
