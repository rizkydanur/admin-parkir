<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkirKeluarTable extends Migration
{
    public function up()
    {
        Schema::create('parkir_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('no_polisi');
            $table->string('id_kartu');
            $table->dateTime('jam_keluar');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('parkir_keluar');
    }
}
