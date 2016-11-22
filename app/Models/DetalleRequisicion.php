<?php

namespace sig\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleRequisicion extends Model
{
     protected $table = 'detalle_requisicions';
    protected $primaryKey = 'id';
 

    protected $fillable=[
    	'id' ,'codigo','nombre','presentacion','unidad_medida','cantidad_solicitada','cantidad_entregada','precio','requisicion_id',
    ];

     
}
