<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionRequest extends Model
{
    use HasFactory;
    protected $table = 'production_requests';
    protected $fillable = [
        'nama_bahan_baku',
        'jenis_bahan_baku',
        'jumlah',
    ];
}
