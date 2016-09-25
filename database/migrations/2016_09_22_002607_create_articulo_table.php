<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticuloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo', function (Blueprint $table) {
            $table->String('codigo_articulo');
			$table->integer('id_especifico');
			$table->integer('id_unidad_medida');
			$table->integer('existencia')->default(0);
			$table->string('nombre_articulo');
			$table->double('costo_unitario')->default(0.00);
			$table->timestamps();
			
			//Definicion de llave primaria
			$table->primary('codigo_articulo');
			// DEfinicion de llaves foraneas
			
			$table->foreign('id_especifico')->references('id')->on('especificos')->onDelete('restrict')->onUpdate('cascade');
			
			$table->foreign('id_unidad_medida')->references('id_unidad_medida')->on('unidad_medida')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    
    public function down()
    {
        Schema::table('articulo', function (Blueprint $table) {
            Schema::drop('articulo');
        });
    }
}
