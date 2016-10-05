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
         $departments = DB::table('departments')->paginate(5);
       return view('Department.index')->with('departamentos',$departments);
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
            'name' => 'required|regex: /^[a-zA-Záéíóúñ\s]*$/ |unique:departamento,name',            
        ]);
        
        Departamento::create([
                   'name' =>$request->input('Departamento')
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
        $department= Department::where('code', '=' ,$id)->firstOrFail();
        return view('Department.eliminar')->with('department',$department);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $department= Department::where('code', '=' ,$id)->firstOrFail();
       return view('Department.actualizar')->with('department',$department);
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
           'name'=>'required|regex: /^[a-zA-Záéíóúñ\s]*$/ |unique:Ni idea ,name,'.$ id.'pdate(Request $request, $id)'
        ]);
        $departament = name::FindOrFail($id);
        if($departamento){
            $deparatamento  ->update([
              'nombre_unidadmedida' => $request->input('nombre_unidadmedida')
              ]);
        flash('Unidad de medida actualizado exitosamente','success');
        return redirect()->route('departamento.index');         
        }else{
            flash('Error: no se pudo actualizar la unidad de medida','danger');
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
        $name = Depar::findOrFail($code);
        if($unidad->articulo->count()>0){           
            flash('Error: No puede eliminarse el departamentode medida porque esta siendo usada por articulos','danger');
            return redirect()->back();
        }else{
            $unidad->delete();
            flash('Departamento eliminada exitosamente','success');
            return redirect()->route('departamento .index');
    }