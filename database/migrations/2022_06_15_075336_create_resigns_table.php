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
        Schema::create('resigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_karyawan')->constrained('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('alasan_resign', ['Melanjutkan pendidikan', 'Perubahan karir', 'Permasalahan gaji', 'Keluarga', 'Lainnya']);
            $table->string('deskripsi', 500);
            $table->enum('status', ['Dalam proses', 'Disetujui', 'Ditolak'])->default('Dalam proses');
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
        Schema::dropIfExists('resigns');
    }
};
