<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class material extends Model
{
    use HasFactory;
    protected $table = 'materials';
    protected $fillable = [
        'nama_bahan_baku',
        'jenis_bahan_baku',
        'jumlah_bahan_baku',
        'total_biaya_bahan_baku',
        'tanggal_pembelian',
        'status_pembayaran',
        'status_bahan_baku',
    ];
}
