
@extends('layouts.template')

@section('content')

<div class="table-responsive">
<table class="table table-hover table-striped table-bordered table-condensed">
    
     <tr class="info">  
            <th>Codigo</th>
            <th>Producto</th>
	        <th>Unidad de medida</th>
	        <th>Especifico</th>
	        <th>Existencia</th>
	        <th>precio Unitario</th>
	        <th></th>   
	 </tr>
	 @foreach ($articulos as $a)
	 <tr>  
        <td>{{$a->codigo_articulo}}</td>
        <td>{{$a->nombre_articulo}}</td>
	    <td>{{$a->unidad->nombre_unidadmedida}}</td>
	    <td>{{$a->especifico->id}}</td>
	    <td>{{$a->existencia}}</td>
	    <td>{{number_format($a->precio_unitario,2,'.','')}}</td>
    
	    <td>	        
	        <a class="btn btn-default btn-sm" href="{{route('articulo.edit',$a->codigo_articulo)}}"><span class="glyphicon glyphicon-pencil" title="Actualizar"></span></a>
	    </td>
	  @endforeach
	    
    </tr>	
</table>
</div> 

@endsection


