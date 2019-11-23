<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformeClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informe_clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_usuario');
            $table->date('fecha');
            $table->integer('actions_on_page');
            $table->integer('page_views');
            $table->integer('page_followers');
            $table->integer('page_likes');
            $table->integer('general_info');
            $table->integer('post_reach');
            $table->integer('post_engagement');
            $table->integer('videos');
            $table->integer('page_previews');
            $table->integer('likes');
            $table->integer('views');
            $table->integer('new_users');
            $table->date('created_at_date');
            $table->date('updated_at_date');

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
        Schema::dropIfExists('informe_clientes');
    }
}
