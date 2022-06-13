<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendances';
    protected $fillable = [
        'id_karyawan',
        'tanggal_kerja',
        'absensi_masuk',
        'absensi_keluar',
        'deskripsi',
        'status'
    ];

    public function employee()
    {
        return $this->belongsTo(User::class, 'id_karyawan');
    }

    public function getTanggalKerja()
    {
        return Carbon::createFromDate($this->attributes['tanggal_kerja'])->translatedFormat('j F Y');
    }
}
