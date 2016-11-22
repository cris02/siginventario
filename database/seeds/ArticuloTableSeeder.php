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

		//unidad de medida
       DB::table('unidad_medida')->insert(['nombre_unidadmedida'=>'litro']);
       DB::table('unidad_medida')->insert(['nombre_unidadmedida'=>'kilo']);
       DB::table('unidad_medida')->insert(['nombre_unidadmedida'=>'unidad']);
       DB::table('unidad_medida')->insert(['nombre_unidadmedida'=>'metro']);
       DB::table('unidad_medida')->insert(['nombre_unidadmedida'=>'galon']);

       	//articulo
       DB::table('articulo')->insert(['codigo_articulo'=>'art01','id_especifico'=>'12345','id_unidad_medida'=>'2','nombre_articulo'=>'papel bond']);
       DB::table('articulo')->insert(['codigo_articulo'=>'art02','id_especifico'=>'12345','id_unidad_medida'=>'4','nombre_articulo'=>'cartulina']);

       		//presentacion de articulos
	    DB::table('presentacion')->insert(['presentacion'=>'300 paginas']);
	    DB::table('presentacion')->insert(['presentacion'=>'500 paginas']);
	    DB::table('presentacion')->insert(['presentacion'=>'3 metros']);
	    DB::table('presentacion')->insert(['presentacion'=>'roja 1m']);

	    	//existencias de los articulos
	    DB::table('art_pres')->insert(['existencia'=>'100','precio_unitario'=>'25','id_pres'=>'1','codigo_articulo'=>'art01']);
	    DB::table('art_pres')->insert(['existencia'=>'50','precio_unitario'=>'5','id_pres'=>'2','codigo_articulo'=>'art01']);
	    DB::table('art_pres')->insert(['existencia'=>'100','precio_unitario'=>'20','id_pres'=>'3','codigo_articulo'=>'art02']);
	    DB::table('art_pres')->insert(['existencia'=>'100','precio_unitario'=>'2','id_pres'=>'4','codigo_articulo'=>'art02']);
    }
}
        
