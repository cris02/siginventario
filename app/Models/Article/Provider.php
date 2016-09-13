<?php

namespace sig\Models\Article;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'providers';
    protected $primarykey = 'id';

    protected $fillable=[
    	'id' ,'name','direction', 'phone', 'fax', 'seller' 
    ];

   
}
