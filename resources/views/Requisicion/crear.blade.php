@extends('layouts.template')

@section('content')

<div>
	<h4>Departamento : {{Auth::User()->departamento['name']}}</h4>
	<h4>Jefe del Departamento : {{Auth::User()->name}}</h4> 
	<div>
           <a href="{{route('detalle_requisicion.index')}}" class="btn btn-success">AgregarArticulo <i class="glyphicon glyphicon-plus"></i></a>
           <a href="{{url('requisicion/store')}}" class="btn btn-success">Enviar Requisicion <i class="glyphicon glyphicon-new-window"></i></a>
           <a href="{{route('requisicion-trash')}}" class="btn btn-default">Cancelar</a>
    </div>    
</div>

<div class="panel-body table-responsive ">

<table class="table table-hover table-striped table-bordered table-condensed" id="TablaRequisicion">
<thead>
    <tr>
        <th>Codigo</th>
        <th>Nombre del Articulo</th>
        <th>Presentacion</th>  
        <th>Unidad de Medida</th>
        <th>Cantidad</th> 
        <th>Precio</th> 
        <th>SubTotal</th>     
        <th></th>
    </tr>
 </thead>
<tbody>
 
@foreach ($requisicion as $r) 

    <tr>  
        <td>{{$r->articulo['codigo_articulo']}}</td>
        <td>{{$r->articulo['nombre_articulo']}}</td>
        <td>{{$r->presentacion['presentacion']}}</td>
        <td>{{$r->articulo['unidad']['nombre_unidadmedida']}}</td>
        <td>
          <input 
              type="number" 
              min="1" 
              max="100" 
              name="cantidad"
              id="articulo_{{$r->id_art_pres}}"
              value="{{$r->cantidad}}"
           >
              <a href="#" class="btn btn-warning"
              	 onClick="actualizarCantidad({{$r->id_art_pres}})" 
              >
              	<i class="glyphicon glyphicon-refresh"></i>
              </a> 
          
        </td>
        <td>{{$r->precio_unitario}}</td>
        <td>{{$r->precio_unitario*$r->cantidad}}</td> 
        <td>
        	<a href="{{route('requisicion-delete',$r->id_art_pres)}}" class="btn btn-danger">
        	    <i class="glyphicon glyphicon-remove"></i>
        	</a>
        </td>
    </tr>
  
@endforeach
</tbody>  
</table>

	<h3>
		<span class="label label-default col-md-offset-5">
			Total :  $ {{number_format($total,2)}}
		</span>
	</h3>
</div>

@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
  
    $("#TablaRequisicion").DataTable(
      {
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": false,
          "autoWidth": true
      });
  });  


var actualizarCantidad= function(id){ 
  var cantidad = $("#articulo_"+id).val(); 
  if(cantidad==""||cantidad>100)
  {
    alert("Debe ingresar un valor valido a cantidad");
  }
  else
  {
    window.location.href = "{{url('requisicion/update')}}/"+id +"/" + cantidad; 
  }  
 
}
</script>
@endsection