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
       DB::table('providers')->insert([ 'id' => '001', 'name' => 'INFRASAL DE EL SALVADOR SA DE CV.', 'direction' => '', 'phone'=>'', 'fax'=>'','seller'=>'NELSON PEÑA']);

       DB::table('providers')->insert([ 'id' => '002', 'name' => 'DISTRIBUIDORA EQUIS, MARINA INDUSTRIAL, SA DE CV.', 'direction' => '', 'phone'=>'', 'fax'=>'','seller'=>'BLANCA GONZALES']);

       DB::table('providers')->insert([ 'id' => '003', 'name' => 'OP EQUIPO DE OFICINA Y MAS SA DE CV', 'direction' => '', 'phone'=>'', 'fax'=>'','seller'=>'CARLOS MENENDES']);

       DB::table('providers')->insert([ 'id' => '004', 'name' => 'DISTRIBUIDORA V Y M', 'direction' => 'CALLE LOS PLANES DE RENDEROS', 'phone'=>'', 'fax'=>'','seller'=>'CLAUDIA MARISOL MOLINA GARCIA']);

       DB::table('providers')->insert([ 'id' => '005', 'name' => 'CONDISANPABLO, SA DE CV', 'direction' => '', 'phone'=>'', 'fax'=>'','seller'=>'ZAYRA TORRES']);

       DB::table('providers')->insert([ 'id' => '006', 'name' => 'OFFICE', 'direction' => '', 'phone'=>'', 'fax'=>'','seller'=>'JUAN MORALES']);

       DB::table('providers')->insert([ 'id' => '007', 'name' => 'DIST. DE PRODUC. MEDICOS SA DE CV', 'direction' => '', 'phone'=>'', 'fax'=>'','seller'=>'OSWALDO']);

       DB::table('providers')->insert([ 'id' => '008', 'name' => 'ESERSKI HERMANOS SA DE CV', 'direction' => '', 'phone'=>'', 'fax'=>'','seller'=>'LUZ REYES']);

       DB::table('providers')->insert([ 'id' => '009', 'name' => 'LA CASA DEL RESPUESTO SA DE CV', 'direction' => 'SAN SALVADOR', 'phone'=>'2205-1500', 'fax'=>'2281-1513','seller'=>'ERICK EDGARDO CERON']);

       DB::table('providers')->insert([ 'id' => '010', 'name' => 'DIAGONAL SA DE CV', 'direction' => 'ALAMEDA ROSSVELT Y 59 AVENIDA NORTE PSJ 5-A,', 'phone'=>'25661124', 'fax'=>'','seller'=>'MARIA CRUZ PEÑA VIUDA DE CERON']);
       
       DB::table('providers')->insert([ 'id' => '011', 'name' => 'INGENIERIA DE HIDROCARBUROS SA DE CV', 'direction' => 'CALLE LAS PALMAS COL. SAN BENITO, CASA 1-7 S.S', 'phone'=>'2511-9400', 'fax'=>'','seller'=>'']);
    }
}

