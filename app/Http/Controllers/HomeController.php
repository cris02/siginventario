<?php

namespace sig\Http\Controllers;

use Illuminate\Http\Request;
use sig\Http\Controllers\Controller;
use sig\Models\Menu\Menu;
use sig\Http\Requests;
use DB;

class HomeController extends Controller
{   /*
	 public function __construct()
    {
        $this->middleware('auth');
    }*/
    
     public function index()
    {
        	 

        return view('home');
     
    }
}
