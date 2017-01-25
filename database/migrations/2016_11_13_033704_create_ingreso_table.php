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
		   $table->double('precio_unitario',10,2);
		   $table->date('fecha_registro');
		   
		   $table->integer('id_proveedor');
		   $table->string('codigo_articulo',11);
		   $table->integer('existencia_ant');
		   $table->double('precio',10,2);
		   $table->timestamps();
		   
		   //Relaciones con producto y proveedor
		   //$table->foreign('codigo_articulo')->references('codigo_articulo')->on('articulo')->onDelete('restrict')->onUpdate('cascade');
           $table->foreign('id_proveedor')->references('id')->on('providers')->onDelete('restrict')->onUpdate('cascade');
		   $table->foreign('codigo_articulo')->references('codigo_articulo')->on('articulo')->onDelete('restrict')->onUpdate('cascade');

		   
	   });
    }

    
    public function down()
    {
        Schema::drop('ingreso');
    }
}
