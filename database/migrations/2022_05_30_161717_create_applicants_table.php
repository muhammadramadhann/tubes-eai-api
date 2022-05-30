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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id()->startingValue(rand());
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Pria', 'Wanita']);
            $table->enum('status_pernikahan', ['Menikah', 'Lajang']);
            $table->string('email');
            $table->string('nomor_hp');
            $table->string('alamat');
            $table->string('pendidikan_terakhir');
            $table->enum('pilihan_divisi', ['Marketing', 'Finance', 'IT', 'SCM', 'HC']);
            $table->enum('status', ['Dalam proses seleksi', 'Lolos', 'Tidak lolos'])->default('Dalam proses seleksi');
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
        Schema::dropIfExists('applicants');
    }
};
