<?php

namespace sig\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;


abstract class EsPerfil
{
    private $auth;
    
   public function __construct(Guard $auth)
   {
        $this->auth = $auth;
   }

   abstract public function getPerfil();

    public function handle($request, Closure $next)
    {
       if (! $this->auth->user()->is($this->getPerfil())) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return response(view('errors.501'));
            }
        }

        return $next($request);
        
    }
}
