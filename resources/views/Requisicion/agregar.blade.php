@extends('layouts.template')

@section('content')

<a href="javascript:window.history.back();" class="btn btn-primary">Cancelar</a>
<div class="panel-body table-responsive ">

<table class="table table-hover table-striped table-bordered table-condensed" id="TablaExistencia">
<thead>
    <tr>
        <th>Codigo</th>
        <th>Nombre del Articulo</th>
        <th>Presentacion</th>  
        <th>Unidad de Medida</th>
        <th>Cantidad</th> 
        <th>Precio</th>             
      <th></th>
    </tr>
 </thead>
<tbody>
 
@foreach ($detalle as $d) 

    <tr>  
        <td>{{$d->articulo['codigo_articulo']}}</td>
        <td>{{$d->articulo['nombre_articulo']}}</td>
        <td>{{$d->presentacion['presentacion']}}</td>
        <td>{{$d->articulo['unidad']['nombre_unidadmedida']}}</td>
        <td>
          <input 
              type="number" 
              min="1" 
              max="100" 
              name="cantidad"
              id="articulo_{{$d->id_art_pres}}" 
          >
        </td>
        <td>{{$d->precio_unitario}}</td>
               
      <td >
          <a 
            class="btn btn-default btn-sm" 
            href="#"
            onClick="agregarRequisicion({{$d->id_art_pres}})"         
             
          >           
            <span class="glyphicon glyphicon-plus" title="Agregar">              
            </span>
          </a>
          
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
  
    $("#TablaExistencia").DataTable(
      {
         "lengthChange": false
      });
  });  


var agregarRequisicion= function(id){ 
  var cantidad = $("#articulo_"+id).val(); 
  if(cantidad==""||cantidad>100)
  {
    alert("Debe ingresar un valor valido a cantidad");
  }
  else
  {
    window.location.href = "{{url('requisicion/add')}}/"+id +"/" + cantidad; 
  }  
 
}
</script>
@endsection