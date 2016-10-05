@extends('layouts.template')

@section('content')

<a href="{{ route('departamento.create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Nuevo</a>
<div class="table-responsive">
<table class="table table-hover table-striped table-bordered table-condensed">
<thead>
    <tr class="success">
        <th>codigo</th>
        <th>Departamenot/Unidad</th>    
      <th></th>
    </tr>
 </thead>
<tbody>
 
@foreach ($departamentos as $d)
    <tr>  
        <td>{{$departamento->code}}</td>
        <td>{{$departamento->name}}</td>    
      <td class="col-md-5">
          <a class="btn btn-default btn-sm" href="{{route('actualizar',$->id_unidad_medida)}}"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
          <a class="btn btn-default btn-sm" href="{{route('departamenot.show',$departamento->)}}"><span class="glyphicon glyphicon-th-large"></span>Detalle</a>
          <a class="btn btn-default btn-sm" href="{{route('departamento.edit',$departamentos->code)}}"><span class="glyphicon glyphicon-pencil"></span>Actualizar</a>
      </td>   
    </tr>
@endforeach
</tbody>  
</table>
</div>
@endsection


