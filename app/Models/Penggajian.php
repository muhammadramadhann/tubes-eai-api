<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    use HasFactory;
    protected $table = 'penggajians';
    protected $fillable = [
        'id',
        'id_absensi',
        'nama_karyawan',
        'divisi',
        'hari_masuk',
        'hari_cuti',
        'gaji_perhari',
        'gaji_total',
        'tanggal_penggajian',
        'bukti'
    ];
}