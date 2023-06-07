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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('id_rempug');
            $table->string('id_cabang');
            $table->string('nik_anggota');
            $table->string('nama_anggota');
            $table->string('alamat_anggota');
            $table->string('jenis_kelamin');
            $table->string('pekerjaan');
            $table->date('tgl_masuk');
            $table->string('telp');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('status');
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
        Schema::dropIfExists('anggotas');
    }
};
