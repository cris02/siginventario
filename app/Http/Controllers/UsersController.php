<?php

namespace sig\Http\Controllers;

use sig\Http\Requests;
use sig\Models\Role;
use sig\Models\User;
use sig\Http\Requests\User\UserCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class UsersController extends Controller
{
   use AuthenticatesUsers;
   protected $loginView = 'auth.login';
    public function index(){
       	$usuarios = User::all();
       	return view('auth.index')->with('usuarios',$usuarios);
    }

    public function authenticate(Request $request)
    {
    	if (Auth::attempt(['name' => $request->nombre, 'password' => $request->contraseña, 'activo' => 'true'])) 
    	{
            return redirect()->intended('home');
		}
		else
		{
			return redirect('/');
		}
       
    }
    public function logout(){
    	Auth::logout();
    	return redirect('/');
    }
  
    public function getRegister(){
    	$roles = Role::lists('name','id')->prepend('Seleccione un perfil');
    	return view('auth.register')->with('roles',$roles);
    }
    public function postRegister(UserCreateRequest $request){

    	
    	User::create([
              	'name' =>$request->input('nombre'),		    
                'email' =>$request->input('email'),
		        'password' => bcrypt($request['password']),
		        'activo' =>'true',	
		        'perfil_id'=>$request->input('perfil')
		        ]
    		);
    
       flash('guardado','success');
       $roles = Role::lists('name','id')->prepend('Seleccione un perfil');
       return view('auth.register')->with('roles',$roles);	
    }
    public function getEdit($id){
    	$usuario = User::FindOrFail($id);
       	$roles = Role::all();    	
    	return view('auth.edit',['roles'=>$roles,'usuario'=>$usuario]);
    }

}
