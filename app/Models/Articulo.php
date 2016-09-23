<?php

namespace sig\Models;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table='articulo';
	protected $primaryKey = 'codigo_articulo';
	
	protected $fillable = [
	    'codigo_articulo','id_especifico','id_unidad_medida','nombre_articulo'
	];
}
