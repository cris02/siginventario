<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticuloPresentacionTable extends Migration
{
    
    public function up()
    {
         Schema::create('art_pres', function (Blueprint $table) {
			 $table->increments('id_art_pres');
		   
		   $table->integer('existencia')->default(0);
		   $table->double('precio_unitario')->default(0.00);
		   
		   $table->integer('id_pres');
		   $table->String('codigo_articulo');
		   $table->timestamps();
		   
		   //Relaciones con producto y presentacion
		   $table->foreign('codigo_articulo')->references('codigo_articulo')->on('articulo')->onDelete('restrict')->onUpdate('cascade');
           $table->foreign('id_pres')->references('id_pres')->on('presentacion')->onDelete('restrict')->onUpdate('cascade');

            			
        }); 
    }

   
    public function down()
    {
        Schema::drop('art_pres');
    }
}



          