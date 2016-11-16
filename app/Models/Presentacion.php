<?php

namespace sig\Models;

use Illuminate\Database\Eloquent\Model;

class Presentacion extends Model
{
    protected $table = 'presentacion';
	protected $primaryKey = 'id_pres';
	
	protected $fillable = ['presentacion'];
	
	public function existencia(){
		return $this->hasMany('sig\Models\Existencia','id_pres');
	}
}
