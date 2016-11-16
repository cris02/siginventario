<?php

namespace sig\Models;

use Illuminate\Database\Eloquent\Model;

class Especifico extends Model
{
    protected $table = 'especificos';
	protected $primarykey = 'id';
	//Indica que no se esta usando una llave autoincremental
    protected $fillable = [
	    'id','titulo_especifico','descripcion_epecifico',
	];
	//Relacion uno a muchos con articulo
	
}
