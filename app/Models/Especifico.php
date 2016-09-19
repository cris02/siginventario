<?php

namespace sig\Models;

use Illuminate\Database\Eloquent\Model;

class Especifico extends Model
{
    protected $table = 'especificos';
	protected $primarykey = 'id';
    protected $fillable = [
	    'id','titulo_especifico','descripcion_epecifico',
	];
}
