<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class material extends Model
{
    use HasFactory;
    protected $table = 'materials';
    protected $fillable = [
        'id_pembelian_bahan_baku',
        'quotation',
        'status_bahan_baku',
        'status_pembayaran'
    ];
}
