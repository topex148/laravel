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

          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

          $table->string('RIF_Prest')->nullable();
          

          $table->unsignedInteger('id_Zona')->nullable();
          $table->foreign('id_Zona')->references('id')->on('zonas')->onDelete('cascade');

          $table->unsignedInteger('id_Atrac')->nullable();
          $table->foreign('id_Atrac')->references('id')->on('atractivos')->onDelete('cascade');

          $table->unsignedInteger('id_Activi')->nullable();
          $table->foreign('id_Activi')->references('id')->on('actividades')->onDelete('cascade');

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
