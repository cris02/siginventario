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
    public function store(DepartmentCreateRequest $request)
    {
        Department::create($request->all());  
       Flash::success('Guardado correctamente!!!');    
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
    public function update(DepartmentUpdateRequest $request, $id)
    {
        //$d = $department= Department::where('code', '=' ,$id)->firstOrFail();  
        DB::table('departments')
            ->where('code', $id)
            ->update(['name' => $request->name]);     
       // $d->update($request->all());
        Flash::success('Se ha Actualizado correctamente!!!');

       return redirect()->route('departamento.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department= Department::where('code', '=' ,$id)->firstOrFail();
         Department::where('code', '=', $department->code)->delete();
        Session::flash('delete','Se ha Eliminado correctamente!!!');
       return redirect()->route('departamento.index');
    }
}
