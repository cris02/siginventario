@extends('layouts.template')

@section('content')
<div class="encabezado">
    <h3>Unidades de medida</h3> 
</div>

<a href="{{ route('unidad.create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Nuevo</a>
<div class="table-responsive">
    
<table class="table table-hover table-striped table-bordered table-condensed" id="TablaUnidadMedida">
<thead>
    <tr class="success">
        
        <th>Unidad</th>    
	    <th></th>
    </tr>
 </thead>
<tbody>
 
@foreach ($unidades as $unidad)
    <tr>  
        
        <td>{{$unidad->nombre_unidadmedida}}</td>    
	    <td class="col-md-5">
	        <a class="btn btn-default btn-sm" href="{{route('delete_unidad',$unidad->id_unidad_medida)}}"><span class="glyphicon glyphicon-trash" title="Eliminar"></span></a>
	        <a class="btn btn-default btn-sm" href="{{route('unidad.show',$unidad->id_unidad_medida)}}"><span class="glyphicon glyphicon-th-large" title="Detalle"></span></a>
	        <a class="btn btn-default btn-sm" href="{{route('unidad.edit',$unidad->id_unidad_medida)}}"><span class="glyphicon glyphicon-pencil" title="Actualizar"></span></a>
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
  
    $('#TablaUnidadMedida').DataTable(
      {         
          "lengthChange": false,
           "autoWidth": false  
      });
  }); 
</script>
@endsection


