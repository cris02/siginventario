<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProviderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name',100);
            $table->string('direction',100);
            $table->string('phone',100);
            $table->string('fax',100);
            $table->string('seller',100);

            $table->timestamps();
            $table->primary("id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('providers');
    }
}
