<?php

namespace sig\Http\Controllers\Departamento;

use Illuminate\Http\Request;

use sig\Http\Requests;
use sig\Http\Controllers\Controller;
use sig\Models\Department;
use DB;
use Session;
use sig\Http\Requests\Department\DepartmentCreateRequest;
use sig\Http\Requests\Department\DepartmentUpdateRequest;

use Laracasts\Flash\Flash;

class DepartmentController extends Controller
{
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
            'code' => 'required|alpha_num|unique:departments,code',
            'name' => 'required|regex: /^[a-zA-Záéíóúñ\s]*$/ |unique:departments,name',            
        ]);
        
        Department::create([
                   'code' =>$request->input('code'),
                   'name' =>$request->input('name')
                   ]);
        flash('Departamento guardada exitosamente','success');     
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
    public function update(Request $request, $code)
    {
       
        $this->validate($request,[
           'name'=>'required|regex: /^[a-zA-Záéíóúñ\s]*$/ |unique:departments,name,'.$code.',code',
        ]);
        $departament = Department::FindOrFail($code);
        if($departament){
            $departament->update([
              'name' => $request->input('name')
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
    public function destroy($code)
    {
        $departament = Department::findOrFail($code);
        
        $departament->delete();
        flash('Departamento eliminado exitosamente','success');
        return redirect()->route('departamento.index');
    }
}