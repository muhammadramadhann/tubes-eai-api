<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resign extends Model
{
    use HasFactory;

    protected $table = 'resigns';
    protected $fillable = [
        'id_karyawan',
        'alasan_resign',
        'deskripsi',
        'status'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_karyawan');
    }
}
