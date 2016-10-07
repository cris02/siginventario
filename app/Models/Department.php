<?php

namespace sig\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    protected $primaryKey = 'code';
    public $incrementing = false;

    protected $fillable=[
    	'code' ,'name' 
    ];
}
