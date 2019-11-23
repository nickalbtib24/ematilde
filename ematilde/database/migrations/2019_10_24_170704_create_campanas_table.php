<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campanas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_campana');
            $table->unsignedInteger('id_usuario')->nullable();
            $table->string('negocio_campana');
            $table->date('fecha_inicio_campana');
            $table->date('fecha_terminacion_campana');
            $table->unsignedInteger('id_tipo_campana')->nullable();
            $table->foreign('id_tipo_campana')->references('id')->on('tipo_campanas')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('campanas');
    }
}
