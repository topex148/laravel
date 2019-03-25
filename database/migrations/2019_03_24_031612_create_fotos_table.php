<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('descripcion');
            $table->string('imagen');
            $table->string('Galeria')->nullable();
            $table->string('RIF_Prest')->nullable();
            $table->unsignedInteger('id_Zona')->nullable();
            $table->unsignedInteger('id_Atrac')->nullable();
            $table->unsignedInteger('id_Activi')->nullable();
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
        Schema::dropIfExists('fotos');
    }
}
