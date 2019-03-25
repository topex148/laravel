<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestadores', function (Blueprint $table) {
            $table->string('RIF');
            $table->primary('RIF');
            $table->string('Telefono')->unique();
            $table->integer('RTN')->unique();
            $table->string('DescripcionServicio');
            $table->string('DescripcionPrestador');
            $table->string('Nombre');
            $table->string('imagen');
            $table->string('Facebook');
            $table->string('Twitter');
            $table->string('Instagram');
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
        Schema::dropIfExists('prestadores');
    }
}
