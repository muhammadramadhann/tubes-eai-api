<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'status_pernikahan',
        'email',
        'nomor_hp',
        'alamat',
        'tanggal_bergabung',
        'divisi',
        'status'
    ];

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    public function offwork()
    {
        return $this->hasMany(Offwork::class);
    }

    public function getTanggalLahir()
    {
        return Carbon::createFromDate($this->attributes['tanggal_lahir'])->translatedFormat('j F Y');
    }

    public function getTanggalBergabung()
    {
        return Carbon::createFromDate($this->attributes['tanggal_bergabung'])->translatedFormat('j F Y');
    }
}
