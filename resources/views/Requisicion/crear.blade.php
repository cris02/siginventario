@extends('layouts.template')

@section('content')

<div>
	<h4>Departamento : <strong>{{Auth::User()->departamento['name']}}</strong></h4>
	<h4>Jefe del Departamento : <strong>{{Auth::User()->name}}</strong></h4> 

	<div>
           <a href="{{route('requisicion.detalle.index')}}" class="btn btn-success">AgregarArticulo <i class="glyphicon glyphicon-plus"></i></a>
           <a href="{{url('requisicion/store')}}" class="btn btn-success">Enviar Requisicion <i class="glyphicon glyphicon-new-window"></i></a>
           @if ($requisicion)
           <a href="{{route('requisicion-observacion',$requisicion->id)}}" class="btn btn-success">Observaciones</a>
           @endif
           <a href="{{route('requisicion-trash')}}" class="btn btn-default">Desechar</a>
    </div>    
</div>

<div class="panel-body table-responsive ">

<table class="table table-hover table-striped table-bordered table-condensed" id="TablaRequisicion">
<thead>
    <tr>
        <th>Codigo</th>
        <th>Nombre del Articulo</th>          
        <th>Unidad de Medida</th>
        <th>Cantidad</th> 
        <th>Precio</th> 
        <th>SubTotal</th>     
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
              id="articulo_{{$a->codigo_articulo}}"
              value="{{$a->cantidad}}"
           >
              <a href="#" class="btn btn-warning"
              	 onClick='actualizarCantidad("{{$a->codigo_articulo}}")' 
              >
              	<i class="glyphicon glyphicon-refresh"></i>
              </a> 
          
        </td>
        <td>{{$a->precio_unitario}}</td>
        <td>{{$a->precio_unitario*$a->cantidad}}</td> 
        <td>
        	<a href="{{route('requisicion-delete',$a->codigo_articulo)}}" class="btn btn-danger">
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
  if(cantidad==""||cantidad>1000||cantidad<1)
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