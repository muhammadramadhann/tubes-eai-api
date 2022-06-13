<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offwork extends Model
{
    use HasFactory;

    protected $table = 'offworks';
    protected $fillable = [
        'id_karyawan',
        'kategori_cuti',
        'tanggal_cuti',
        'tanggal_kembali',
        'deskripsi',
        'status'
    ];
}
