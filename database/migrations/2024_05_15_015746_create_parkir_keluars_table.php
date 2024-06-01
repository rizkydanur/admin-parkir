<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkirKeluarsTable extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection($this->connection)->create('parkir_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('no_polisi', 20); // Vehicle number
            $table->string('id_kartu', 50); // Card ID
            $table->dateTime('jam_keluar'); // Entry time
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
        Schema::connection($this->connection)->dropIfExists('parkir_keluars');
    }
}
