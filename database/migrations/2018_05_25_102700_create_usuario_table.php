<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('usuario_id');
            $table->string('nombre');
            $table->integer('phone');
            $table->string('direccion');
            $table->string('username');
            $table->integer('ci');
            $table->string('foto')->nullable();
            $table->string('password');
            $table->foreign('usuario_id')->references('id')->on('tipo_usuario');
            $table->rememberToken();
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
        Schema::dropIfExists('usuario');
    }
}
