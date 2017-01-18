<?php

namespace sig\Models;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table='ingreso';
	protected $primaryKey = 'id_ingreso';
	//Especifica que no usa un entero autoincremental o numerico
	//public $incrementing = true;
	
	protected $fillable = [
	    'cantidad','precio_unitario','fecha_registro','id_proveedor','precio','existencia_ant','codigo_articulo'];
	//Relacion uno a muchos con articulo
	public function existencia(){
        return $this->belongsTo('sig\Models\articulo','codigo_articulo','codigo_articulo');
    }
	//Relacion uno a muchos con Provider
	public function proveedor(){
        return $this->belongsTo('sig\Models\Provider','id_poveedor','id');
    }
	
	public function monto(){
		return ($this->cantidad * $this->precio_unitario);
	}
	
	public function montoExistencia(){
		return ($this->existencia_ant * $this->precio);
	}


	
}
