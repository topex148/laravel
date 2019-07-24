<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtractivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atractivos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('zona_id');
            $table->foreign('zona_id')->references('id')->on('zonas')->onDelete('cascade');
            $table->string('Nombre_Atractivo');
            $table->string('Ubicacion');
            $table->text('Descripcion_Atractivo');
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
        Schema::dropIfExists('atractivos');
    }
}
