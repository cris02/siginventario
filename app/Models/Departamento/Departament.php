<?php

namespace sig\Models\Departamento;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    //
    protected $table = 'departments';
    protected $primarykey = 'code';

    protected $fillable=[
    	'code' ,'depto/Unidad','Jefe de departamento', 'telefono' 
    ];
}
