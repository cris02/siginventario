<?php

namespace sig\Http\Middleware;

class admin_middleware extends EsPerfil{
	public function getPerfil(){
		return 1;
	}
}