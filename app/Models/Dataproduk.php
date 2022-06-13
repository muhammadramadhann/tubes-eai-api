<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataproduk extends Model
{
    use HasFactory;

    protected $table = 'dataproduks';
    protected $fillable = [
        'nama_produk',
        'ketersediaan_produk',
        'jumlah_stok',
    ];
}
