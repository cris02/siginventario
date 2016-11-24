<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresoTable extends Migration
{
    
    public function up()
    {
       Schema::create('ingreso', function(Blueprint $table){
		   $table->increments('id_ingreso');
		   
		   $table->integer('cantidad');
		   $table->double('precio_unitario');
		   $table->date('fecha_registro');
		   
		   $table->integer('id_proveedor');
		   $table->integer('id_art_pres');
		   $table->integer('existencia_ant');
		   $table->double('precio');
		   $table->timestamps();
		   
		   //Relaciones con producto y proveedor
		   //$table->foreign('codigo_articulo')->references('codigo_articulo')->on('articulo')->onDelete('restrict')->onUpdate('cascade');
           $table->foreign('id_proveedor')->references('id')->on('providers')->onDelete('restrict')->onUpdate('cascade');
		   $table->foreign('id_art_pres')->references('id_art_pres')->on('art_pres')->onDelete('restrict')->onUpdate('cascade');

		   
	   });
    }

    
    public function down()
    {
        Schema::drop('ingreso');
    }
}
