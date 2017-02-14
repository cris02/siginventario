<?php

namespace sig\Http\Controllers;

use Illuminate\Http\Request;
use sig\Http\Controllers\Controller;
use sig\Models\Requisicion;
use sig\Http\Requests;
use DB;

class HomeController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
        if(!\Session::has('num_req')) 
        \Session::put('num_req',array());
    }
    
     public function index()
    {
    	    	     
       $num = Requisicion::where('estado','enviada')->get()->count();
       \Session::put('num_req',$num);
        return view('home');
     
    }
}
