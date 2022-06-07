<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencairan extends Model
{
    use HasFactory;
    protected $table = 'pencairans';
    protected $fillable = [
        'id',
        'id_pengajuan',
        'jml_dana_keluar',
        'tanggal_pencairan',
        'keterangan',
        'bukti'
    ];
}