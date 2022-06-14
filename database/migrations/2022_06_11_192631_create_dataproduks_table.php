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
        Schema::create('dataproduks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->enum('ketersediaan_produk', ['Tersedia', 'Tidak tersedia']);
            $table->integer('jumlah_stok')->default(0);
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
        Schema::dropIfExists('dataproduks');
    }
};
