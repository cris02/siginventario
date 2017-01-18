<?php

use Illuminate\Database\Seeder;

class ArticuloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //especifico
       DB::table('especificos')->insert(['id'=>'12345','titulo_especifico'=>'papel','descripcion_epecifico'=>'tolo lo relacionado a papel']);
       DB::table('especificos')->insert(['id'=>'12346','titulo_especifico'=>'articulos de limpieza','descripcion_epecifico'=>'tolo lo relacionado a articulos de limpieza']);

    //unidad de medida
       DB::table('unidad_medida')->insert(['nombre_unidadmedida'=>'litro']);
       DB::table('unidad_medida')->insert(['nombre_unidadmedida'=>'kilo']);
       DB::table('unidad_medida')->insert(['nombre_unidadmedida'=>'unidad']);
       DB::table('unidad_medida')->insert(['nombre_unidadmedida'=>'metro']);
       DB::table('unidad_medida')->insert(['nombre_unidadmedida'=>'galon']);

        //articulo
       DB::table('articulo')->insert(['codigo_articulo'=>'art01','id_especifico'=>'12345','id_unidad_medida'=>'2','nombre_articulo'=>'papel bond','existencia'=>'50','precio_unitario'=>'2']);

       DB::table('articulo')->insert(['codigo_articulo'=>'art02','id_especifico'=>'12345','id_unidad_medida'=>'4','nombre_articulo'=>'cartulina','existencia'=>'40','precio_unitario'=>'5']);

       DB::table('articulo')->insert(['codigo_articulo'=>'art03','id_especifico'=>'12346','id_unidad_medida'=>'5','nombre_articulo'=>'desinfectante limon','existencia'=>'10','precio_unitario'=>'7']);

       DB::table('articulo')->insert(['codigo_articulo'=>'art04','id_especifico'=>'12346','id_unidad_medida'=>'1','nombre_articulo'=>'jabon liquido','existencia'=>'300','precio_unitario'=>'2.5']);

       DB::table('articulo')->insert(['codigo_articulo'=>'7','id_especifico'=>'12346','id_unidad_medida'=>'3','nombre_articulo'=>'escoba','existencia'=>'30','precio_unitario'=>'3.0']);

       DB::table('articulo')->insert(['codigo_articulo'=>'art05','id_especifico'=>'12346','id_unidad_medida'=>'2','nombre_articulo'=>'papel bond','existencia'=>'100','precio_unitario'=>'0.5']);

       DB::table('articulo')->insert(['codigo_articulo'=>'art06','id_especifico'=>'12346','id_unidad_medida'=>'4','nombre_articulo'=>'tollas para trapeador','existencia'=>'50','precio_unitario'=>'1.0']);

       DB::table('articulo')->insert(['codigo_articulo'=>'art08','id_especifico'=>'12346','id_unidad_medida'=>'3','nombre_articulo'=>'acetatos cg 3460 injet','existencia'=>'10','precio_unitario'=>'3.5']);

       DB::table('articulo')->insert(['codigo_articulo'=>'art09','id_especifico'=>'12346','id_unidad_medida'=>'4','nombre_articulo'=>'agar base sangre','existencia'=>'20','precio_unitario'=>'2.5']);


    }
}
        
