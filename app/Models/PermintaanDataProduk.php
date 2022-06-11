<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanDataProduk extends Model
{
    use HasFactory;

    protected $table = 'permintaan_data_produks';
    protected $fillable = [
        'id_permintaan',
        'ketersediaan_produk',
        'status_pengiriman_kepada_scm',
        'status_produk',
    ];
}
