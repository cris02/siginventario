<?php

namespace sig\Http\Controllers\Departamento;

use Illuminate\Http\Request;

use sig\Http\Requests;
use sig\Http\Controllers\Controller;
use sig\Models\Department;
use sig\User;
use DB;
use Session;
use sig\Http\Requests\Department\DepartmentCreateRequest;
use sig\Http\Requests\Department\DepartmentUpdateRequest;

use Laracasts\Flash\Flash;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamento = Department::orderBy('name','asc')->get();
        return view('Department.index',['departamento'=>$departamento]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Department.insertar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'max:100|required|regex: /^[a-zA-Z0-9áéíóúñ\s]*$/ |unique:departments,name',
            'descripcion'=>'required',                       
        ]);
        
        Department::create([
                   'name' =>$request->input('name'),
                   'descripcion' =>$request->input('descripcion'),
                   'encargado'=>'No Definido',
                   'enviar'=>'true',
                            ]);
        flash('Departamento guardado exitosamente','success');     
        return redirect()->route('departamento.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department= Department::FindOrFail($id);
        return view('Department.eliminar',['department'=>$department]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       $department= Department::findOrFail($id);
       return view('Department.actualizar',['department'=>$department]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $this->validate($request,[
           'name'=>'max:100|required|regex: /^[a-zA-Z0-9áéíóúñ\s]*$/ |unique:departments,name,'.$id.',id',
           'descripcion'=>'required',
           
        ]);
        $departament = Department::FindOrFail($id);
        if($departament){
            $departament->update([
              'name' => $request->input('name'),
              'descripcion' => $request->input('descripcion'),
             
              ]);
        flash('Departamento actualizado exitosamente','success');
        return redirect()->route('departamento.index');         
        }else{
            flash('Error: no se pudo actualizar el Departamento','danger');
            return redirect()->route('departamento.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departamento = Department::findOrFail($id);
        $usuario=User::where('departamento_id','=',$departamento->id)->get();

        if($usuario->count()>0)
       {
            flash('Error: no puede eliminarse el DEPARTAMENTO porque hay Registros asociados','danger');
            return redirect()->back();
        }
        else
        {
             $departamento->delete();
        flash('Departamento eliminado exitosamente','success');
        return redirect()->route('departamento.index');
        }
       
    }    
       
}