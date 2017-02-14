@extends('layouts.template')

@section('content')
<div class="encabezado">
    <h3>Especificos</h3>
</div>

<a href="{{ route('especifico.create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Nuevo</a>

<div class="table-responsive">
<table class="table table-hover table-striped table-bordered table-condensed" id="TablaEspecifico">
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
	    <td class="col-md-5">
	        <a class="btn btn-default btn-sm" href="{{route('yes',$especifico->id)}}"><span class="glyphicon glyphicon-trash"></span></a>
	        <a class="btn btn-default btn-sm" href="{{route('especifico.show',$especifico->id)}}"><span class="glyphicon glyphicon-th-large"></span></a>
	        <a class="btn btn-default btn-sm" href="{{route('especifico.edit',$especifico->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
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
  
    $('#TablaEspecifico').DataTable(
      {         
          "lengthChange": false,
           "autoWidth": false  
      });
  }); 
</script>
@endsection


