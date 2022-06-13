<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salesreport extends Model
{
    use HasFactory;

    protected $table = 'salesreport';
    protected $fillable = [
        'tanggal_penjualan',
        'harga_produk',
        'jumlah_penjualan',
        'total_pendapatan',
        'strategi',
        'status_target',
    ];
}
