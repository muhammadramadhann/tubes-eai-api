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
        Schema::create('production_reports', function (Blueprint $table) {
            $table->id()->startingValue(rand());
            $table->integer('id_produksi');
            $table->enum('status_produksi',['Success','Failed']);
            $table->string('judul_laporan');
            $table->integer('biaya_produksi');
            $table->string('lampiran');
            $table->string('keterangan');
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
        Schema::dropIfExists('production_reports');
    }
};
