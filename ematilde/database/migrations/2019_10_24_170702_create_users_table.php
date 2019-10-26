<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_usuario');
            $table->string('apellido_usuario');
            $table->integer('edad_usuario');
            $table->string('email_usuario')->unique();
            $table->string('clave_usuario');
            $table->integer('identificacion_usuario');
            $table->string('empresa_usuario');
            $table->string('telefono_usuario');
            $table->string('direccion_usuario');
            $table->integer('intentos_usuario');
            $table->unsignedInteger('id_perfil');
            $table->unsignedInteger('id_tipo_cliente');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function($table) {
            $table->foreign('id_perfil')->references('id')->on('perfiles')->onDelete('cascade');
            $table->foreign('id_tipo_cliente')->references('id')->on('tipo_clientes')->onDelete('cascade');        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
