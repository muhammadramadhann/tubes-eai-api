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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_karyawan')->constrained('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal_kerja');
            $table->time('absensi_masuk');
            $table->time('absensi_keluar')->nullable();
            $table->string('deskripsi', 500);
            $table->enum('status', ['Dalam verifikasi', 'Sudah diverifikasi', 'Absensi tidak valid'])->default('Dalam verifikasi');
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
        Schema::dropIfExists('attendances');
    }
};
