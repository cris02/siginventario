<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//perfiles
    	DB::table('roles')->insert(['name' => 'Administrador del Sistema', 'description' => 'Administrador del Sistema']);
      DB::table('roles')->insert(['name' => 'Administrador de Bodega', 'description' => 'Administrador de Bodega']);
      DB::table('roles')->insert(['name' => 'Administrador Financiero', 'description' => 'Administrador Financiero']);	
      DB::table('roles')->insert(['name' => 'departamento', 'description' => 'Usuario de departamento']);


       	//usuarios
       	DB::table('users')->insert([ 'name' => 'Administrador Del Sistema', 'email' => 'admin@gmail.com','usuario'=>'admin', 'password'=>bcrypt('123456'), 'activo'=>'true','perfil_id'=>'1']);

        DB::table('users')->insert([ 'name' => 'cristian armando', 'email' => 'cristian@gmail.com','usuario'=>'cr', 'password'=>bcrypt('123456'), 'activo'=>'true','perfil_id'=>'2']);

        DB::table('users')->insert([ 'name' => 'francisco alfredo', 'email' => 'francisco@gmail.com','usuario'=>'fr', 'password'=>bcrypt('123456'), 'activo'=>'true','perfil_id'=>'3']);
      
    }
}
