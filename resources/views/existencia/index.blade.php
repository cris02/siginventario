f
@extends('layouts.template')

@section('content')

{!! Form::open(array('route' => 'existencia.index','class' => 'form-inline navbar-right','method' => 'get')) !!}               
        
               <div class="form-group">
                {!!Form::label('Buscar', 'Buscar', array('class' =>'sr-only' )) !!}
			    
                {!!Form::text('buscar', null, array('placeholder' => '','class' => 'form-control')) !!}
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
				</div>               
   
{!! Form::close() !!}

<br/>
<a href="{{ route('ingreso.index')}}" class="btn btn-success"><span class="glyphicon glyphicon-book"></span> Ir a ingresos</a>

	{{$buscar}}
 
@foreach ($articulos as $articulo)
<div class="table-responsive">
<table class="table table-hover table-striped table-bordered table-condensed">
    
     <tr class="info">  
            <th>Codigo</th>
            <th>Producto</th>
	        <th>Unidad de medida</th>
	        <th>Especifico</th>
	        <th></th>   
	 </tr>
	 <tr>  
        <td>{{$articulo->codigo_articulo}}</td>
        <td>{{$articulo->nombre_articulo}}</td>
	    <td>{{$articulo->unidad->nombre_unidadmedida}}</td>
	    <td>{{$articulo->especifico->id}}</td>
    
	    <td class="col-md-5">
	        <a class="btn btn-default btn-sm" href="{{route('delete_articulo',$articulo->codigo_articulo)}}"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
	        <a class="btn btn-default btn-sm" href="{{route('articulo.show',$articulo->codigo_articulo)}}"><span class="glyphicon glyphicon-th-large"></span>Detalle</a>
	        <a class="btn btn-default btn-sm" href="{{route('articulo.edit',$articulo->codigo_articulo)}}"><span class="glyphicon glyphicon-pencil"></span>Actualizar</a>
	    </td>
	    
    </tr>
	
	<tr>
	    <td class="text-center" colspan="4">Presentaciones</td>
		<td class="text-center" ><a href="{{route('addPresentacion',$articulo->codigo_articulo)}}" class="btn btn-success">Agregar presentacion</a></td>
	</tr>
	<tr class="table-bordered">
	    <td colspan="5">
		@foreach ($articulo->existencia as $exist)
		    <div class="panel panel-warning">
			    <div class="panel-heading" role="tab">
				    <h4 class="panel-title">
				        <strong>Presentacion:</strong> {{$exist->presentacion->presentacion}}
					</h4>
				</div>
				<div class="panel-body">
				    <strong>Existencia: </strong>{{$exist->existencia}}<br/>
		            <strong>Precio: </strong>{{number_format($exist->precio_unitario,2,'.','')}}<br/>
					<strong>Monto: </strong>{{number_format($exist->monto(),2,'.','')}}<br/>
					<a href="{{route('addExistencia',[$articulo->codigo_articulo,$exist->presentacion->id_pres])}}" data-toggle="modal" class="btn btn-success btn-sm">Agregar existencia</a>
				</div>		    
				
			</div>
		 @endforeach   
			
		</td>
	</tr>        
   </table>
</div> 
@endforeach


@endsection


