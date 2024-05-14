<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkirMasukTable extends Migration
{
    public function up()
    {
        Schema::create('parkir_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('no_polisi');
            $table->string('id_kartu');
            $table->dateTime('jam_masuk');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('parkir_masuk');
    }
}

