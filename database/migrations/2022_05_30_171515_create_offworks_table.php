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
        Schema::create('offworks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_karyawan')->constrained('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('kategori_cuti', ['Cuti tahunan', 'Sakit', 'Menstruasi', 'Melahirkan', 'Lainnya']);
            $table->date('tanggal_cuti');
            $table->date('tanggal_kembali');
            $table->string('deskripsi', 500);
            $table->enum('status', ['Dalam proses', 'Disetujui', 'Tidak disetujui'])->default('Dalam proses');
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
        Schema::dropIfExists('offworks');
    }
};
