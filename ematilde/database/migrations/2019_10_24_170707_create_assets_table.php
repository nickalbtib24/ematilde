<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_campana')->nullable();
            $table->string('nombre_asset');
            $table->string('archivo_asset');
            $table->string('descripcion_asset');
            $table->date('fecha_inicio_asset');
            $table->date('fecha_finalizacion_asset');
            $table->date('fecha_subida_archivo');
            $table->foreign('id_campana')->references('id')->on('campanas')->onDelete('cascade');
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
        Schema::dropIfExists('assets');
    }
}
