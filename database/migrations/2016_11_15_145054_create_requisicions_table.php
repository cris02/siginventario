<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisicionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisicions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('estado',20);
            $table->date('fecha_solicitud')->nullable();
            $table->date('fecha_entrega')->nullable();
            $table->integer('departamento_id');
            $table->double('total',10,2)->default(0.00);
            $table->string('descripcion')->nullable(); 
            $table->string('comentario')->nullable();          
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
        Schema::drop('requisicions');
    }
}
