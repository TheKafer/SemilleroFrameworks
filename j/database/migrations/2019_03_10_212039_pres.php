<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pres extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_origen');
            $table->integer('id_destino');
            $table->integer('id_oferta');
            $table->integer('id_sistema');
            $table->integer('estado_prestamo')->unsigned()->default(2);
            $table->decimal('pagado',12,2);
            $table->integer('num_cuotas');
            $table->integer('pagina')->unsigned()->default(1);
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
         Schema::dropIfExists('pres');
    }
}
