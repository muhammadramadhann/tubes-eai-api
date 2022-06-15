<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_karyawan');
    }

    public function getTanggalCutiAttribute()
    {
        return Carbon::createFromDate($this->attributes['tanggal_cuti'])->translatedFormat('j F Y');
    }

    public function getTanggalKembaliAttribute()
    {
        return Carbon::createFromDate($this->attributes['tanggal_kembali'])->translatedFormat('j F Y');
    }
}
