<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo(Employee::class, 'id_karyawan');
    }
}
