<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([ 'id'=>'1','name' => 'Articulos']);
        DB::table('menus')->insert([ 'id'=>'2','name' => 'Departamentos']);
        DB::table('menus')->insert([ 'id'=>'3','name' => 'Proveedores']);
        
       
    }
}
