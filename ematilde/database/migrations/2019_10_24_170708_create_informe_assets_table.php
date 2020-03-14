<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformeAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informe_assets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_asset')->nullable();
            $table->decimal('impressions');
            $table->decimal('cost_per_result');
            $table->decimal('ammount_spent');
            $table->decimal('link_clicks');
            $table->decimal('reach');
            $table->date('fecha_ultima_actualizacion');
            $fecha->date('fecha_cracion');
            $table->foreign('id_asset')->references('id')->on('assets')->onDelete('cascade');
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
        Schema::dropIfExists('informe_assets');
    }
}
