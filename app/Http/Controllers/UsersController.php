<?php

namespace sig\Http\Controllers;

use sig\Http\Requests;
use sig\Models\Role;
use sig\Models\Department;
use sig\User;
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
       	$usuarios = User::all();
       	return view('auth.index')->with('usuarios',$usuarios);
    }

    public function authenticate(Request $request)
    {
    	if (Auth::attempt(['usuario' => $request->nombre, 'password' => $request->contraseña, 'activo' => 'true'])) 
    	{
            return redirect()->intended('home');
		}
		else
		{
     
			return redirect('/')
      ->withInput($request->only('nombre'))
      ->withErrors([
          'nombre'=>'Las credenciales no son validas.'
        ]);
		}
       
    }
    public function logout(){
    	Auth::logout();
    	return redirect('/');
    }
  
    public function getRegister(){
    	$roles = Role::where('id','!=',4)->lists('name','id')->prepend('Seleccione un perfil');    	
      return view('auth.register',['roles'=>$roles]);
    }
     public function create($id)
    {
       $roles = Role::where('id','!=',4)->lists('name','id')->prepend('Seleccione un perfil');      
      return view('auth.insertar',['roles'=>$roles,'departamento'=>$id]);
    }
    public function postRegister(UserCreateRequest $request){

      if($request->input('depto'))
      {
        $depto= Department::FindOrFail($request->input('depto')); 
        User::create([
            'name' =>$request->input('name'), 
            'usuario' =>$request->input('usuario'),       
            'email' =>$request->input('email'),
            'password' => bcrypt($request['password']),
            'activo' =>'true',  
            'perfil_id'=>'4',
            'departamento_id'=>$depto->id,
            ]
        );           
       
        $depto->update([           
            'encargado' =>$request->input('name'),                                 
          ]);
       flash('guardado','success');       
        return redirect()->route('departamento.index');
      }
      else
      {
      	User::create([
            'name' =>$request->input('name'),	
            'usuario' =>$request->input('usuario'),  	    
            'email' =>$request->input('email'),
		        'password' => bcrypt($request['password']),
		        'activo' =>'true',	
		        'perfil_id'=>$request->input('perfil'),
		        ]
    		);
    
       flash('guardado','success');
        $usuarios = User::all();
        return view('auth.index')->with('usuarios',$usuarios);
      }
    }
    public function getEdit($id){
    	  $usuario = User::FindOrFail($id);
       	$roles = Role::all();    	
    	  return view('auth.edit',['roles'=>$roles,'usuario'=>$usuario]);
    }

    //funcion actualizar usuario
    public function update(Request $request, $id){

      $this->validate($request,[
            'nombre'=>'required|max:100|regex: /^[a-zA-Z0-9áéíóúñÑ,\s\-\_\.]*$/|unique:users,name,'.$id.',id',
            'email' => 'required|email|max:255|unique:users,email,'.$id.',id',
            'password' => 'confirmed|min:6',

        ]); 
      
         //recuperar usuario a actualizar
        $usuario = User::FindOrFail($id);
        $depto=Department::FindOrFail($usuario->departamento_id);
        $depto->update([           
            'encargado' =>$request->input('nombre'),                                 
          ]);

         if($request->input('depto'))//if deptos
        {
          if($request->input('password'))
          {
            $usuario->update([           
            'name' =>$request->input('nombre'),
            'usuario' =>$request->input('usuario'),        
            'email' =>$request->input('email'),
            'password' => bcrypt($request['password']),             
          ]);
          }
          else
          {
            $usuario->update([           
            'name' =>$request->input('nombre'),       
            'email' =>$request->input('email'),
            'usuario' =>$request->input('usuario'),               
          ]);
          }
          
        flash('actualizado','success');
        return redirect()->back();
        }//fin if deptos
        else
        {
          if($request->input('password'))
          {
             $usuario->update([          
            'name' =>$request->input('nombre'),           
            'password' => bcrypt($request['password']),                 
            'email' =>$request->input('email'), 
            'usuario' =>$request->input('usuario'),         
            'activo' =>$request->input('activo'),  
            'perfil_id'=>$request->input('perfil')
          ]);
          }
          else
          {
             $usuario->update([          
            'name' =>$request->input('nombre'),                         
            'email' =>$request->input('email'), 
            'usuario' =>$request->input('usuario'),         
            'activo' =>$request->input('activo'),  
            'perfil_id'=>$request->input('perfil')
          ]);
          }
        
        flash('actualizado','success');
        $usuarios = User::all();
        return view('auth.index')->with('usuarios',$usuarios); 
        }    
        
    }//fin de update

     public function show($id)
    {
        $usuario= User::FindOrFail($id);
        return view('auth.delete')->with('usuario',$usuario);
    }

   public function destroy($id)
    {
      $u=User::FindOrFail($id);
      $departamento = Department::where('usuario_id',$u->id)->get();  
       if($departamento->count()>0)
       {
            flash('Error: no puede eliminarse el USUARIO porque hay Registros asociados','danger');
            return redirect()->back();
        }
        else
        {
            $u->delete();
            flash('eliminado exitosamente','success');
            $usuarios = User::all();
            return view('auth.index')->with('usuarios',$usuarios);
        }
    }

     public function edit($id)
    {
        $usuario = User::FindOrFail($id);
        $roles = Role::all();     
        return view('auth.actualizar',['roles'=>$roles,'usuario'=>$usuario]);
    }

}
