<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleRequisicionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_requisicions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->string('nombre');
            $table->string('presentacion');
            $table->string('unidad_medida');
            $table->integer('cantidad_solicitada');
            $table->integer('cantidad_entregada')->default(0);
            $table->double('precio');
            $table->integer('requisicion_id');
            $table->timestamps();

            $table->foreign('requisicion_id')->references('id')->on('requisicions'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detalle_requisicions');
    }
}
    