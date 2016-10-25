<?php

namespace sig\Http\Controllers;

use sig\Http\Requests;
use sig\Models\Role;
use sig\Models\User;
use DB;
use sig\Http\Requests\User\UserCreateRequest;
use sig\Http\Requests\User\UserUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Laracasts\Flash\Flash;

class UsersController extends Controller
{
   use AuthenticatesUsers;
   protected $loginView = 'auth.login';

    public function index(){
       	$usuarios = DB::table('users')
        ->join('roles', 'roles.id', '=', 'users.perfil_id')
        ->select('users.*', 'roles.name as perfil')        
        ->get();
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
            'name' =>$request->input('name'),		    
            'email' =>$request->input('email'),
		        'password' => bcrypt($request['password']),
		        'activo' =>'true',	
		        'perfil_id'=>$request->input('perfil')
		        ]
    		);
    
       flash('guardado','success');
        $usuarios = User::all();
        return view('auth.index')->with('usuarios',$usuarios);
    }
    public function getEdit($id){
    	  $usuario = User::FindOrFail($id);
       	$roles = Role::all();    	
    	  return view('auth.edit',['roles'=>$roles,'usuario'=>$usuario]);
    }
    public function update(Request $request, $id){

      $this->validate($request,[
            'nombre'=>'required|max:100|regex: /^[a-zA-Z0-9áéíóúñÑ,\s\-\_\.]*$/|unique:users,name,'.$id.',id',
            'email' => 'required|email|max:255|unique:users,email,'.$id.',id',
            'password' => 'confirmed|min:6',
            'perfil'=>'required',
         
        ]);  

        $usuario = User::FindOrFail($id);
        if($request->input('password')){
        $usuario->update([       
           
            'password' => bcrypt($request['password']),  
            'name' =>$request->input('nombre'),       
            'email' =>$request->input('email'),          
            'activo' =>$request->input('activo'),  
            'perfil_id'=>$request->input('perfil')
          ]);
        flash('actualizado','success');
        $usuarios = User::all();
        return view('auth.index')->with('usuarios',$usuarios);
        
      }
      else{
       $usuario->update([       
           
            'name' =>$request->input('nombre'),       
            'email' =>$request->input('email'),          
            'activo' =>$request->input('activo'),  
            'perfil_id'=>$request->input('perfil')
          ]);
        flash('actualizado','success');
        $usuarios = User::all();
        return view('auth.index')->with('usuarios',$usuarios);
      }       
  }
     public function show($id)
    {
        $usuario= User::FindOrFail($id);
        return view('auth.delete')->with('usuario',$usuario);
    }

   public function destroy($id)
    {
       $p=User::FindOrFail($id);
       $p->delete();
       Flash::success('El Usuario fue eliminado');
       return redirect()->route('usuario.index');
    }

     public function edit($id)
    {
        $usuario = User::FindOrFail($id);
        $roles = Role::all();     
        return view('auth.actualizar',['roles'=>$roles,'usuario'=>$usuario]);
    }

}
