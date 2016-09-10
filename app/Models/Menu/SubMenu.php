<?php

namespace sig\Models\Menu;

use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
     protected $table = 'sub_menus';
    protected $primarykey = 'id';

    protected $fillable=[
    	'id' ,'name' , 'route', 'menus_id'
    ];

    public function menu()
    {
    	return $this->belongsto(Menu::class); 
    }
}
