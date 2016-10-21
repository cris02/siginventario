<?php

namespace sig\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	 protected $fillable = [
        'name', 'email', 'password','activo','perfil_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}








