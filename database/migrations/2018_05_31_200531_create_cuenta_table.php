<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta', function (Blueprint $table) {
            $table->increments('cuenta_id');
            $table->boolean('estado_pago');
            $table->decimal('total', 8, 2);
            $table->unsignedInteger('pedido_id');
            $table->foreign('pedido_id')->references('pedido_id')->on('pedido');
            $table->unsignedInteger('cliente_id');
            //$table->foreign('cliente_id')->references('cliente_id')->on('cliente');
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
        Schema::dropIfExists('cuenta');
    }
}
