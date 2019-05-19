<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Prestamos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('prestamos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad_cuotas');
            $table->integer('cantidad_cuotas_restantes');
            $table->decimal('cantidad',12,2);
            $table->decimal('interes',4,2);
            $table->integer('usuario_id_prestamista');
            $table->integer('usuario_id_endeudado');
            $table->integer('plazo');
            $table->integer('estado');
            $table->integer('pagina');
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
         Schema::dropIfExists('prestamos');
    }
}
