<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('usuario')->unique();
            $table->string('password');
            $table->boolean('activo');
            $table->integer('perfil_id'); 
            $table->integer('departamento_id')->nullable();         
            $table->rememberToken();
            $table->timestamps();

            //$table->primary('id');
            $table->foreign('perfil_id')->references('id')->on('roles'); 
            $table->foreign('departamento_id')->references('id')->on('departments');          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
