<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSppa extends Migration
{
    
    public function up()
    {
        Schema::create('data_sppa', function (Blueprint $table) {
            $table->id();
            $table->integer('id_data_klaiment');
            $table->string('peserta_1');
            $table->string('peserta_2');
            $table->string('foto_ktp_peserta');
            $table->string('foto_tanda_tangan');
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
        Schema::dropIfExists('data_sppa');
    }
}
