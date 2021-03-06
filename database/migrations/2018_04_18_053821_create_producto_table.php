<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('producto_id');
            $table->integer('estado_id');
            $table->string('nombre');
            $table->decimal('precio', 6, 2);
            $table->string('descripcion');
            $table->string('foto')->nullable();
            $table->unsignedInteger('categoria_id');
            $table->foreign('categoria_id')->references('categoria_id')->on('categoria');
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
        Schema::dropIfExists('producto');
    }
}
