<?php

namespace sig\Models;

use Illuminate\Database\Eloquent\Model;
use sig\Models\UnidadMedida;

class Articulo extends Model
{
    protected $table='articulo';
	protected $primaryKey = 'codigo_articulo';
	//Especifica que no usa un entero autoincremental o numerico
	public $incrementing = false; 
		
	protected $fillable = [
	    'codigo_articulo','id_especifico','id_unidad_medida','nombre_articulo'
	];
	//Relacion Muchos a uno con unidad medidaret
	public function unidad()
    {
        return $this->belongsTo('sig\Models\UnidadMedida','id_unidad_medida','id_unidad_medida');
    }
	//relacion uno a muchos con especifico
	public function especifico(){
        return $this->belongsTo('sig\Models\Especifico','id_especifico','id');
    }

	
	
}
