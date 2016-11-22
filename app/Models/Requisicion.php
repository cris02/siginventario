<?php

namespace sig\Models;

use Illuminate\Database\Eloquent\Model;

class Requisicion extends Model
{
    protected $table = 'requisicions';
    protected $primaryKey = 'id';
 

    protected $fillable=[
    	'id' ,'estado','departamento_id','fecha_solicitud','fecha_entrega','total',
    ];

      
   public function departamento(){
		return $this->hasOne('sig\Models\Department','departamento_id');
	}

}
