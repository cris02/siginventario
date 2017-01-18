@extends('layouts.template')

@section('content')

<a href="javascript:window.history.back();" class="btn btn-primary">Cancelar</a>
<div class="panel-body table-responsive ">

<table class="table table-hover table-striped table-bordered table-condensed" id="TablaExistencia">
<thead>
    <tr>
        <th>Codigo</th>
        <th>Nombre del Articulo</th>       
        <th>Unidad de Medida</th>
        <th>Cantidad</th> 
        <th>Precio</th>             
      <th></th>
    </tr>
 </thead>
<tbody>
 
@foreach ($articulos as $a) 

    <tr>  
        <td>{{$a->codigo_articulo}}</td>
        <td>{{$a->nombre_articulo}}</td>        
        <td>{{$a->unidad['nombre_unidadmedida']}}</td>
        <td>
          <input 
              type="number" 
              min="1" 
              max="1000" 
              name="cantidad"
              id="{{$a->codigo_articulo}}" 
          >
        </td>
        <td>{{$a->precio_unitario}}</td>
               
      <td >
          <a 
            class="btn btn-default btn-sm" 
            href="#"
            onClick='agregarArticulo("{{$a->codigo_articulo}}")'         
             
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


var agregarArticulo= function(id){ 
 
  var cantidad = $("#"+id).val(); 
  if(cantidad==""||cantidad>1000||cantidad<1)
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