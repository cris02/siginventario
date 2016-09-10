<?php

namespace sig\Models\Menu;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $primarykey = 'id';

    protected $fillable=[
    	'id' ,'name' 
    ];

    public function sub_menu()
    {
    	return $this->hasmany(SubMenu::class);
    }
}
