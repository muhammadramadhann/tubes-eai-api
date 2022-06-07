<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionReport extends Model
{
    use HasFactory;
    protected $table = 'production_reports';
    protected $fillable = [
        'id_produksi',
        'status_produksi',
        'judul_laporan',
        'biaya_produksi',
        'lampiran',
        'keterangan'
    ];
}
