<?php

namespace sig\Models;

use Illuminate\Database\Eloquent\Model;

class CodigoRequisicion extends Model
{
    	private static function maximo($requisiciones){
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
	    return $max;
	}
	
	public static function getCodigo($requisiciones, $año){			
		$codigo = "";
		$valMaximo = CodigoRequisicion::maximo($requisiciones);
		$valMaximo = $valMaximo + 1;//Incrementamos en uno el contador 
		$strmax = (string) $valMaximo;//lo convertimos a cadena
		if(strlen($strmax) == 1){
			$strmax = "00".$strmax;//Concatena 2 ceros a la izquierda
		}
		if(strlen($strmax) == 2){
			$strmax = "0".$strmax;//Concatena un cero a la izquierda
		}
	  		
		//Genera el codigo en el formato 999/YYYY
		$codigo = $strmax.'/'.$año;
		return $codigo;		
	}
}
