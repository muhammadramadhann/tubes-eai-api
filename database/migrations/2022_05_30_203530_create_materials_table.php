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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bahan_baku');
            $table->string('jenis_bahan_baku');
            $table->integer('jumlah_bahan_baku');
            $table->integer('total_biaya_bahan_baku');
            $table->date('tanggal_pembelian');
            $table->string('status_pembayaran');
            $table->string('status_bahan_baku');
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
        Schema::dropIfExists('materials');
    }
};
