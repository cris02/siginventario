<?php

namespace sig\Http\Controllers\Article;

use Illuminate\Http\Request;

use sig\Http\Requests;
use sig\Http\Controllers\Controller;
use sig\Models\Article\Provider;
use DB;
use Session;
use sig\Http\Requests\Provider\ProviderCreateRequest;
use sig\Http\Requests\Provider\ProviderUpdateRequest;
use Laracasts\Flash\Flash;

class ProviderController extends Controller
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
        $providers = Provider::all();
        return view('Provider\index')->with('proveedores',$providers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Provider.insertar');
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
            'nombre'=>'required|unique:providers|regex: /^[a-zA-Z0-9áéíóúñÑ,\s\-\.]*$/|max:60 ',
            'direccion'=>'required|regex: /^[a-zA-Z0-9áéíóúñÑ,\s\-]*$/ ',
            'vendedor'=>'required|regex: /^[a-zA-Z0-9áéíóúñÑ,\s]*$/|max:60',
            'telefono'=>'required|max:9',
        ]);         


       Provider::create($request->all());
    
       Flash::success('Guardado correctamente!!!');    
       return redirect()->route('proveedor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provider= Provider::FindOrFail($id);
        return view('Provider.eliminar')->with('provider',$provider);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $provider = Provider::FindOrFail($id);
       return view('Provider.actualizar')->with('provider',$provider);
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
            'nombre'=>'max:60|required|regex: /^[a-zA-Z0-9áéíóúñÑ,\s\-\.]*$/ |unique:providers,nombre,'.$id.',id',
            'direccion'=>'required|regex: /^[a-zA-Z0-9áéíóúñÑ,\s\-]*$/ ',
            'vendedor'=>'required|regex: /^[a-zA-Z0-9áéíóúñÑ,\s]*$/|max:60',
            'telefono'=>'required|max:9',
         
        ]);

       $p = Provider::FindOrFail($id);       
       $p->update($request->all());
       Flash::success('Se ha Actualizado correctamente!!!');

       return redirect()->route('proveedor.index');

    }

    /**,
 \s

     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $p=Provider::FindOrFail($id);
       $p->delete();
    Flash::success('El proveedor fue eliminado');
       return redirect()->route('proveedor.index');
    }

     public function detail($id)
    {
        $provider= Provider::FindOrFail($id);
        return response()->json($provider);
    }
}
