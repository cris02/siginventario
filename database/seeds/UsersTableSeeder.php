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
    	DB::table('roles')->insert([ 'id'=>'1','name' => 'admin_sistema', 'description' => 'Administrador del Sistema']);
       	DB::table('roles')->insert([ 'id'=>'2','name' => 'admin_bodega', 'description' => 'Administrador de Bodega']);
       	DB::table('roles')->insert([ 'id'=>'3','name' => 'admin_financiero', 'description' => 'Administrador Financiero']);     	
       	DB::table('roles')->insert([ 'id'=>'4','name' => 'depto', 'description' => 'Usuario de departamento']);


       	//usuarios
       	DB::table('users')->insert([ 'name' => 'admin', 'email' => 'admin@gmail.com', 'password'=>bcrypt('123456'), 'activo'=>'true','perfil_id'=>'1']);
       	DB::table('users')->insert([ 'name' => 'user1', 'email' => 'user1@gmail.com', 'password'=>bcrypt('123456'), 'activo'=>'true','perfil_id'=>'2']);
       	DB::table('users')->insert([ 'name' => 'user2', 'email' => 'user2@gmail.com', 'password'=>bcrypt('123456'), 'activo'=>'true','perfil_id'=>'4']);
    }
}
