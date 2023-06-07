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
        Schema::create('petugas', function (Blueprint $table) {
            $table->id();
            $table->string('id_cabang');
            $table->string('nama_petugas');
            $table->string('nik_petugas');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('telpon');
            $table->date('tgl_masuk');
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
        Schema::dropIfExists('petugas');
    }
};
