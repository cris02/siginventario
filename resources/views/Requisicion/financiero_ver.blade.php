@extends('layouts.template')

@section('content')
 <h3>Departamento : {{$requisicion->departamento['name']}}</h3>
<a href="javascript:window.history.back();" class="btn btn-primary">Regresar</a>
<a href="{{url('requisicion/detalle/aprobar',$requisicion->id)}}" class="btn btn-primary">Aprobar</a>
<div class="panel-body table-responsive ">
 
<table class="table table-hover table-striped table-bordered table-condensed" id="TablaDetalleRequesicion">
<thead>
    <tr>
        <th>Codigo</th>
        <th>Nombre del Articulo</th>        
        <th>Unidad de Medida</th>
        <th>Cant Solicitada</th> 
        <th>Cant Aprobada</th>
        <th>Precio</th>             
    </tr>
 </thead>
<tbody>
 
@foreach ($detalle as $d) 

    <tr>  
        <td>{{$d->articulo['codigo_articulo']}}</td>
        <td>{{$d->articulo['nombre_articulo']}}</td>
        <td>{{$d->articulo['unidad']['nombre_unidadmedida']}}</td>
        <td>{{$d->cantidad_solicitada}}</td>     
        <td>{{$d->cantidad_entregada}}</td>
        <td>{{$d->articulo['precio_unitario']}}</td>
               
   
    </tr>
  
@endforeach
</tbody>  
</table>
</div>
     
@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
  
    $("#TablaDetalleRequesicion").DataTable(
      {
        "lengthChange": false,
        "searching": false,
        "info": false,
      });
  });  


</script>
@endsection