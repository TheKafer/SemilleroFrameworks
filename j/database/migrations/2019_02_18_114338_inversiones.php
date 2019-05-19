<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Inversiones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inversiones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->decimal('valor',12,2);
            $table->text('descripcion');
            $table->string('tipo');
            $table->integer('tiempo');
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
         Schema::dropIfExists('inversiones');
    }
}
