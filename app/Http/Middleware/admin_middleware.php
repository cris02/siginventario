<?php

namespace sig\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class admin_middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $usuario_actual = Auth::user();
        
        if($usuario_actual->perfil_id!=1){
            return view("errors.501");
        }
        return $next($request);
    }
}
