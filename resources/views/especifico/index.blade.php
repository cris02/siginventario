@extends('layouts.template')

@section('content')
<div class="col-md-10">
<hr/>

<a href="{{ route('especifico.create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Nuevo</a>
<br/>
<div class="table-responsive">
<table class="table table-hover table-striped table-bordered table-condensed">
<thead>
    <tr class="success">
        <th>Numero</th>
        <th>Titulo</th>
        <th>Descripcion</th>
	    <th></th>
        </tr>
</thead>
<tbody>
 
@foreach ($especificos as $especifico)
  <tr>
  
    <td>{{$especifico->id}}</td>
    <td>{{$especifico->titulo_especifico}}</td>
    <td>{{$especifico->descripcion_epecifico}}</td>
	<td>
	    <a class="btn btn-default btn-sm" href="{{route('yes',$especifico->id)}}"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
	    <a class="btn btn-default btn-sm" href="{{route('especifico.show',$especifico->id)}}"><span class="glyphicon glyphicon-th-large"></span>Detalle</a>
	    <a class="btn btn-default btn-sm" href="{{route('especifico.edit',$especifico->id)}}"><span class="glyphicon glyphicon-pencil"></span>Actualizar</a>
	</td>
         
    </tr>
 @endforeach

</tbody>
  
</table>
</div>
</div>

@endsection


