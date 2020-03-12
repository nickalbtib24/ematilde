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
            $table->unsignedInteger('id_campana')->nullable();
            $table->decimal('reach');
            $table->decimal('budget');
            $table->decimal('results');
            $table->decimal('impressions');
            $table->decimal('ammount_spent');
            $table->decimal('link_clicks');
            $table->decimal('cost_per_result');
            $table->decimal('state');
            $table->date('date');
            $table->date('fecha_ultima_actualizacion');
            $table->date('fecha_cracion');
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
