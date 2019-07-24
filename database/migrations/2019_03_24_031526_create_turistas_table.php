<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTuristasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turistas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId');
            $table->integer('edad');
            $table->string('Pais_P');
            $table->string('Estado_P');
            $table->string('genero');

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
        Schema::dropIfExists('turistas');
    }
}
