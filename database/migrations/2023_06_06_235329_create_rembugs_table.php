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
        Schema::create('rembugs', function (Blueprint $table) {
            $table->id();
            $table->string('id_cabang');
            $table->string('id_kota');
            $table->string('id_kecamatan');
            $table->string('id_kelurahan');
            $table->string('nama_rembug');
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
        Schema::dropIfExists('rembugs');
    }
};
