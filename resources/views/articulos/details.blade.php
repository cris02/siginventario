@extends('layouts.template')

@section('content')

<div class="col-md-offset-1">
    <h3>Detalle articulo</h3>
</div>
<hr/>
 @if($articulo)
	 
     <dl class="dl-horizontal"> 
	    <dt>codigo: </dt> 
		   <dd>{{$articulo->codigo_articulo}}</dd> 
		<dt>Articulo: </dt> 
		   <dd>{{ $articulo->nombre_articulo}}
		</dd>
		<dt>Unidad de medida: </dt> 
		   <dd>{{$articulo->unidad->nombre_unidadmedida }}</dd>
		<dt>Especifico: </dt> 
		   <dd>{{$articulo->especifico->titulo_especifico}}</dd>
	 </dl>
	 <div class="col-md-offset-1">
         <a href="{{ route('articulo.index')}}" class="btn btn-primary">Vover a la lista</a>
     </div>            
 
 @endif
@endsection