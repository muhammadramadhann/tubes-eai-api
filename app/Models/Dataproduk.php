<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataproduk extends Model
{
    use HasFactory;

    protected $table = 'dataproduks';
    protected $fillable = [
        'ketersediaan_produk',
        'status_pengiriman_kepada_scm',
        'status_produk',
    ];
}
