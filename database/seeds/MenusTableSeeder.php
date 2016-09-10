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
        
        DB::table('sub_menus')->insert([ 'name' => 'Insertar Articulo', 'route'=>'#','menus_id'=>'1']);
        DB::table('sub_menus')->insert([ 'name' => 'Editar Articulo', 'route'=>'#','menus_id'=>'1']);
        DB::table('sub_menus')->insert([ 'name' => 'Eliminar Articulo', 'route'=>'#','menus_id'=>'1']);
        DB::table('sub_menus')->insert([ 'name' => 'Lista de Articulos', 'route'=>'#','menus_id'=>'1']);

        DB::table('sub_menus')->insert([ 'name' => 'Insertar Departamento', 'route'=>'#','menus_id'=>'2']);
        DB::table('sub_menus')->insert([ 'name' => 'Editar Departamento', 'route'=>'#','menus_id'=>'2']);
        DB::table('sub_menus')->insert([ 'name' => 'Eliminar Departamento', 'route'=>'#','menus_id'=>'2']);
        DB::table('sub_menus')->insert([ 'name' => 'Lista de Departamentos', 'route'=>'#','menus_id'=>'2']);

        DB::table('sub_menus')->insert([ 'name' => 'Insertar Proveedor', 'route'=>'#','menus_id'=>'3']);
        DB::table('sub_menus')->insert([ 'name' => 'Editar Proveedor', 'route'=>'#','menus_id'=>'3']);
        DB::table('sub_menus')->insert([ 'name' => 'Eliminar Proveedor', 'route'=>'#','menus_id'=>'3']);
        DB::table('sub_menus')->insert([ 'name' => 'Lista de Proveedores', 'route'=>'#','menus_id'=>'3']);
    }
}
