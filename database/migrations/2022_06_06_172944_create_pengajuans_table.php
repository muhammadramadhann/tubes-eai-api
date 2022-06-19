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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pegawai');
            $table->enum('divisi',['Human Resource', 'IT Team', 'Marketing', 'SCM', 'Finance']);
            $table->string('proposal')->nullable();
            $table->date('tanggal_mengajukan');
            $table->enum('status_pengajuan', ['Tertunda', 'Diterima', 'Diporses', 'Disetujui', 'Ditolak']);
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
        Schema::dropIfExists('pengajuans');
    }
};
