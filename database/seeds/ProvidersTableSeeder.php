<?php

use Illuminate\Database\Seeder;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('providers')->insert([ 'id' => '001', 'name' => 'proveedor 01', 'direction' => 'direccion 01', 'phone'=>'7090-9034', 'fax'=>'12345678','seller'=>'vendedor 01']);

       DB::table('providers')->insert([ 'id' => '002', 'name' => 'proveedor 02', 'direction' => 'direccion 02', 'phone'=>'7190-9034', 'fax'=>'12345678','seller'=>'vendedor 02']);

       DB::table('providers')->insert([ 'id' => '003', 'name' => 'proveedor 03', 'direction' => 'direccion 03', 'phone'=>'7090-9034', 'fax'=>'12345678','seller'=>'vendedor 03']);
    }
}

