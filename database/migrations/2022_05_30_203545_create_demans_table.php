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
        Schema::create('demans', function (Blueprint $table) {
            $table->id()->startingValue(rand());
            $table->string('id_permintaan');
            $table->string('nama_produk');
            $table->integer('jumlah_produk');
            $table->enum('status_produk',['Dikemas', 'Diproses','Dikirim','Diterima']);
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
        Schema::dropIfExists('demans');
    }
};
