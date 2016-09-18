<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('departaments', function (Blueprint $table) {
            $table->integer('code');
            $table->string('departamento',100);
            $table->string('Jefe de departamento',100);
            $table->string('telefono',100);
        

            $table->timestamps();
            $table->primary("code");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('departaments');
    }
}
