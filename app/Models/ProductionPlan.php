<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionPlan extends Model
{
    use HasFactory;
    protected $table = 'production_plans';
    protected $fillable = [
        'kegiatan_produksi',
        'penanggung_jawab',
        'rencana_anggaran',
        'jenis_barang',
        'deskripsi',
        'tanggal_produksi',
    ];
}
