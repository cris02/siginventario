@extends('layouts.template')

@section('content')

<a href="{{ route('articulo.create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Nuevo</a>

<div class="table-responsive">
<table class="table table-hover table-striped table-bordered table-condensed">
    <thead>
        <tr class="success">  
            <th>codigo</th>
            <th>Producto</th>
	        <th>Unidad de medida</th>
	        <th>Especifico</th>
	        <th></th>   
	    </tr>
	</thead>
<tbody>
 
@foreach ($articulos as $articulo)
    <tr>  
        <td>{{$articulo->codigo_articulo}}</td>
        <td>{{$articulo->nombre_articulo}}</td>
	    <td>{{$articulo->unidad->nombre_unidadmedida}}</td>
	    <td>{{$articulo->especifico->id}}</td>
    
	    <td class="col-md-5">
	        <a class="btn btn-default btn-sm" href="{{route('delete_articulo',$articulo->codigo_articulo)}}"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
	        <a class="btn btn-default btn-sm" href="{{route('articulo.show',$articulo->codigo_articulo)}}"><span class="glyphicon glyphicon-th-large"></span>Detalle</a>
	        <a class="btn btn-default btn-sm" href="{{route('articulo.edit',$articulo->codigo_articulo)}}"><span class="glyphicon glyphicon-pencil"></span>Actualizar</a>
	    </td>
	    
    </tr>
 @endforeach

</tbody>  
</table>
</div>

@endsection


