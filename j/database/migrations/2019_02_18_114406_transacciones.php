<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Transacciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('transacciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo');
            $table->decimal('cantidad',12,2);
            $table->string('descripcion');
            $table->string('nombre');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users');
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
        Schema::dropIfExists('transacciones');
    }
}
