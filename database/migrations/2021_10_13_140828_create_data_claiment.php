<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataClaiment extends Migration
{
    public function up()
    {
        Schema::create('data_claiment', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('nama_lengkap');
            $table->text('alamat');
            $table->string('no_tlp');
            $table->integer('status_sppa');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_claiment');
    }
}
