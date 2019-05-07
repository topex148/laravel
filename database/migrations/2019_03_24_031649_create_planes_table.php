<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('imagen')->nullable();
            $table->integer('precio')->nullable();

            $table->date('Fecha_Inicio')->nullable();
            $table->date('Fecha_Final')->nullable();
            $table->string('Publicidad')->nullable();
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
        Schema::dropIfExists('planes');
    }
}
