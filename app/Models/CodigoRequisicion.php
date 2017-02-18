<?php

namespace sig\Models;

use Illuminate\Database\Eloquent\Model;

class CodigoRequisicion extends Model
{
    	private static function maximo($requisiciones){
	
	}
	
	public static function getCodigo($requisiciones){			
		$max = 0;
		$valor = 0;
		if(count($requisiciones ) == 0){
			$max = 0;
		}else{
		foreach($requisiciones as $r)
		{  
		    $valor = (int)substr($r->id,0,3);		    
		    if($max < $valor){
				
				$max = $valor;
			}
		}
		}
	    //Devuelve el valor maximo entre todos los codigo de requisiciones registrados
	    return $max+1;	
	}
}
