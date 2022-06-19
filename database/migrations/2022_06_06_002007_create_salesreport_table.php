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
        Schema::create('salesreports', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_penjualan');
            $table->integer('harga_produk');
            $table->integer('jumlah_penjualan');
            $table->integer('total_pendapatan');
            $table->string('strategi');
            $table->enum('status_target',['Tercapai','Tidak tercapai']);
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
        Schema::dropIfExists('salesreport');
    }
};
