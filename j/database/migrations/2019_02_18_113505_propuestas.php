<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Propuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('cantidad',12,2);
            $table->decimal('interes',4,2);
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->text('descripcion');
            $table->integer('cantidad_cuotas');
            $table->integer('plazo');
            $table->string('usuario_name');
            $table->integer('estado');
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
        Schema::dropIfExists('propuestas');
    }
}
