<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class demans extends Model
{
    use HasFactory;
    protected $table = 'demans';
    protected $fillable = [
        'nama_produk',
        'jumlah_produk',
        'deskripsi'
    ];
}
