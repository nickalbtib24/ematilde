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
            $table->unsignedInteger('id_campana');
            $table->string('nombre_asset');
            $table->string('archivo_asset');
            $table->dateTime('fecha_subida_archivo');
            $table->unsignedInteger('id_tipo_asset');
            $table->foreign('id_campana')->references('id')->on('campanas')->onDelete('cascade');
            $table->foreign('id_tipo_asset')->references('id')->on('tipo_assets')->onDelete('cascade');
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
