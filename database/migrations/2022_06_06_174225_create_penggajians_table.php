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
        Schema::create('penggajians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_absensi');
            $table->foreign('id_absensi')->references('id')->on('attendances');
            $table->string('nama_karyawan');
            $table->enum('divisi',['Human Resource', 'IT Team', 'Marketing', 'SCM', 'Finance']);
            $table->string('hari_masuk');
            $table->string('hari_cuti');
            $table->string('gaji_perhari');
            $table->string('gaji_total');
            $table->date('tanggal_penggajian');
            $table->string('bukti');
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
        Schema::dropIfExists('penggajians');
    }
};
