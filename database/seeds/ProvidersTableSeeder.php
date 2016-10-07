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
       DB::table('providers')->insert([ 'id' => '001', 'nombre' => 'INFRASAL DE EL SALVADOR SA DE CV.', 'direccion' => '', 'telefono'=>'', 'fax'=>'','vendedor'=>'NELSON PEÑA']);

       DB::table('providers')->insert([ 'id' => '002', 'nombre' => 'DISTRIBUIDORA EQUIS, MARINA INDUSTRIAL, SA DE CV.', 'direccion' => '', 'telefono'=>'', 'fax'=>'','vendedor'=>'BLANCA GONZALES']);

       DB::table('providers')->insert([ 'id' => '003', 'nombre' => 'OP EQUIPO DE OFICINA Y MAS SA DE CV', 'direccion' => '', 'telefono'=>'', 'fax'=>'','vendedor'=>'CARLOS MENENDES']);

       DB::table('providers')->insert([ 'id' => '004', 'nombre' => 'DISTRIBUIDORA V Y M', 'direccion' => 'CALLE LOS PLANES DE RENDEROS', 'telefono'=>'', 'fax'=>'','vendedor'=>'CLAUDIA MARISOL MOLINA GARCIA']);

       DB::table('providers')->insert([ 'id' => '005', 'nombre' => 'CONDISANPABLO, SA DE CV', 'direccion' => '', 'telefono'=>'', 'fax'=>'','vendedor'=>'ZAYRA TORRES']);

       DB::table('providers')->insert([ 'id' => '006', 'nombre' => 'OFFICE', 'direccion' => '', 'telefono'=>'', 'fax'=>'','vendedor'=>'JUAN MORALES']);

       DB::table('providers')->insert([ 'id' => '007', 'nombre' => 'DIST. DE PRODUC. MEDICOS SA DE CV', 'direccion' => '', 'telefono'=>'', 'fax'=>'','vendedor'=>'OSWALDO']);

       DB::table('providers')->insert([ 'id' => '008', 'nombre' => 'ESERSKI HERMANOS SA DE CV', 'direccion' => '', 'telefono'=>'', 'fax'=>'','vendedor'=>'LUZ REYES']);

       DB::table('providers')->insert([ 'id' => '009', 'nombre' => 'LA CASA DEL RESPUESTO SA DE CV', 'direccion' => 'SAN SALVADOR', 'telefono'=>'2205-1500', 'fax'=>'2281-1513','vendedor'=>'ERICK EDGARDO CERON']);

       DB::table('providers')->insert([ 'id' => '010', 'nombre' => 'DIAGONAL SA DE CV', 'direccion' => 'ALAMEDA ROSSVELT Y 59 AVENIDA NORTE PSJ 5-A,', 'telefono'=>'25661124', 'fax'=>'','vendedor'=>'MARIA CRUZ PEÑA VIUDA DE CERON']);
       
       DB::table('providers')->insert([ 'id' => '011', 'nombre' => 'INGENIERIA DE HIDROCARBUROS SA DE CV', 'direccion' => 'CALLE LAS PALMAS COL. SAN BENITO, CASA 1-7 S.S', 'telefono'=>'2511-9400', 'fax'=>'','vendedor'=>'']);
    }
}

