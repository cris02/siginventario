@extends('layouts.template')

@section('content')
<div class="col-md-10">
@if($success = Session::get('success'))
<div class="alert alert-success">
    {{$success}}
</div>	
@endif


@if(Session::get('error'))
<div class="alert alert-danger">
    {{Session::get('error')}}
</div>	
@endif

<hr/>
<a href="{{ route('unidad.create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Nuevo</a>
<div class="table-responsive">
<table class="table table-hover table-striped table-bordered table-condensed">
<thead>
    <tr class="success">
      
        <th>codigo</th>
        <th>Unidad</th>    
	    <th></th>
    </tr>
 </thead>
<tbody>
 
@foreach ($unidades as $unidad)
  <tr>
  
    <td>{{$unidad->id_unidad_medida}}</td>
    <td>{{$unidad->nombre_unidadmedida}}</td>
    
	<td>
	    <a class="btn btn-default btn-sm" href="{{route('delete_unidad',$unidad->id_unidad_medida)}}"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
	    <a class="btn btn-default btn-sm" href="{{route('unidad.show',$unidad->id_unidad_medida)}}"><span class="glyphicon glyphicon-th-large"></span>Detalle</a>
	    <a class="btn btn-default btn-sm" href="{{route('unidad.edit',$unidad->id_unidad_medida)}}"><span class="glyphicon glyphicon-pencil"></span>Actualizar</a>
	</td>
         
    </tr>
 @endforeach

</tbody>
  
</table>
</div>
</div>


@endsection


