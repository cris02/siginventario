<?php

namespace sig\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
     protected $table = 'departments';
    protected $primarykey = 'code';

    protected $fillable=[
    	'code' ,'name' 
    ];
}
