@extends('layouts.template')

@section('content')

<a href="{{ route('ingreso.create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Agregar existencia</a>

<div class="table-responsive">
<table class="table table-hover table-striped table-bordered table-condensed">
    <thead>
        <tr class="success">  
            <th>Fecha</th>
            <th>Producto</th>
			<th>Presentacion</th>
	        <th>Unidad de medida</th>
	        <th>cantidad</th>
			<th>Costo($)</th>
			<th>Monto($)</th>
	        <th>cantidad</th>
			<th>Costo($)</th>
			<th>Monto($)</th>
	         
	    </tr>
	</thead>
<tbody>
 
@foreach ($ingresos as $ingreso)
    <tr>  
	    
        <td>{{$ingreso->fecha_registro}}</td>
        <td>{{$ingreso->existencia->articulo->nombre_articulo}}</td>
		<td>{{$ingreso->existencia->presentacion->presentacion}}</td>
        <td>{{$ingreso->existencia->articulo->unidad->nombre_unidadmedida}}</td>
		<td>{{$ingreso->cantidad}}</td>
		<td>{{number_format($ingreso->precio_unitario,2,'.','')}}</td>
	    <td>{{number_format($ingreso->monto(),2,'.','')}}</td>
		<td>{{$ingreso->existencia_ant}}</td>
		<td>{{number_format($ingreso->precio,2,'.','')}}</td>
		<td>{{number_format($ingreso->montoExistencia(),2,'.','')}}</td>
	    
    </tr>
 @endforeach

</tbody>  
</table>
</div>

@endsection


