<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Applicant extends Model
{
    use HasFactory;

    protected $table = 'applicants';
    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'status_pernikahan',
        'email',
        'nomor_hp',
        'alamat',
        'pendidikan_terakhir',
        'pilihan_divisi',
        'status'
    ];

    public function getTanggalLahirAttribute()
    {
        return Carbon::createFromDate($this->attributes['tanggal_lahir'])->translatedFormat('j F Y');
    }
}
