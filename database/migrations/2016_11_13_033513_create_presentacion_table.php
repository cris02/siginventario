<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresentacionTable extends Migration
{
    
    public function up()
    {
        Schema::create('presentacion', function (Blueprint $table) {
            $table->increments('id_pres');
            $table->string('presentacion');
            //usado por laravel para la concurrencia
			$table->timestamps();			
        });
    }

    
    public function down()
    {
        Schema::drop('presentacion');
    }
}