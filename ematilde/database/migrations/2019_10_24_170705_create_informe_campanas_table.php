<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformeCampanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informe_campanas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_campana');
            $table->decimal('kpi_1');
            $table->decimal('kpi_2');
            $table->decimal('kpi_3');
            $table->decimal('kpi_4');
            $table->decimal('kpi_5');
            $table->dateTime('fecha_ultima_actualizacion');
            $table->dateTime('fecha_cracion');
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
        Schema::dropIfExists('informe_campanas');
    }
}
