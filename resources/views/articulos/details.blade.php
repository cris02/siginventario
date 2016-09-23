@extends('layouts.template')

@section('content')

<br/>
<div class="col-md-offset-1">
<h3>Detalle</h3>
</div>
<hr/>
 @if($articulo)
	 
     <dl class="dl-horizontal"> 
	    <dt>codigo: </dt> 
		   <dd>{{ $articulo->codigo_articulo}}
		</dd> 
		<dt>Articulo: </dt> 
		   <dd>{{ $articulo->nombre_articulo}}
		</dd>
	 </dl>
	 <div class="col-md-offset-1">
         <a href="{{ route('articulo.index')}}" class="btn btn-primary">Vover a la lista</a>
     </div>
            
 @else
	 <div class="alert alert-info">
       Articulo no encontrado
	   <br/><br/>
	   <a href="{{ route('articulo.index')}}" class="btn btn-primary">Volver</a>
     </div>
 @endif
@endsection