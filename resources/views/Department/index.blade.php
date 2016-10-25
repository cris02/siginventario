@extends('layouts.template')

@section('content')

<a href="{{ route('departamento.create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Nuevo</a>
<div class="panel-body table-responsive ">
<table class="table table-hover table-striped table-bordered table-condensed" id="TablaDeptos">
<thead>
    <tr class="success">
        <th>codigo</th>
        <th>Departamento/Unidad</th>    
      <th></th>
    </tr>
 </thead>
<tbody>
 
@foreach ($departamento as $d)
    <tr>  
        <td>{{$d->code}}</td>
        <td>{{$d->name}}</td>    
      <td class="col-md-5">
          <a class="btn btn-default btn-sm" href="{{route('departamento.show',$d->code)}}"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
          <a class="btn btn-default btn-sm" href="{{route('departamento.edit',$d->code)}}"><span class="glyphicon glyphicon-pencil"></span>Actualizar</a>
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
  
    $('#TablaDeptos').DataTable();
  });  
</script>
@endsection


