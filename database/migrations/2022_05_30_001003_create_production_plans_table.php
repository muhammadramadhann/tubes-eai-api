<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_plans', function (Blueprint $table) {
            $table->id()->startingValue(rand());
            $table->string('kegiatan_produksi');
            $table->string('penanggung_jawab');
            $table->integer('rencana_anggaran');
            $table->string('jenis_barang');
            $table->string('deskripsi');
            $table->date('tanggal_produksi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('production_plans');
    }
};
