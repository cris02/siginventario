@extends('layouts.template')

@section('content')
<div class="encabezado">
    <h3>Departamentos</h3>
</div>
<a href="{{ route('departamento.create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Nuevo</a>
<div class="panel-body table-responsive ">
<table class="table table-hover table-striped table-bordered table-condensed" id="TablaDeptos">
<thead>
    <tr class="success">
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Encargado</th>     
      <th></th>
    </tr>
 </thead>
<tbody>
 
@foreach ($departamento as $d)
    <tr>  
        <td>{{$d->name}}</td>
        <td>{{$d->descripcion}}</td> 
        <td>{{$d->encargado}}</td>    
      <td class="col-md-5">
          <a class="btn btn-default btn-sm" href="{{route('departamento.show',$d->id)}}"><span class="glyphicon glyphicon-trash" title="Eliminar"></span></a>
          <a class="btn btn-default btn-sm" href="{{route('departamento.edit',$d->id)}}"><span class="glyphicon glyphicon-pencil" title="Actualizar"></span></a>
          @if($d->encargado=='No Definido')
            <a class="btn btn-default btn-sm" href="{{url('usuario/create',$d->id)}}"><span class="glyphicon glyphicon-user" title="Añadir Usuario"></span></a>
          @endif
      </td>   
    </tr>
@endforeach
</tbody>  
</table>
</div>
     
@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
  
    $('#TablaDeptos').DataTable(
      {         
          "lengthChange": false,   
      });
  });  
</script>
@endsection


