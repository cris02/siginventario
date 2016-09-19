@extends('layouts.template')

@section('content')

<br/>
<div class="col-md-offset-1">
<h3>Detalle</h3>
</div>
<hr/>
 @if($unidad)
	 
     <dl class="dl-horizontal"> 
	    <dt>Unidad de medida: </dt> 
		   <dd>{{ $unidad->nombre_unidadmedida}}</dd> 
	 </dl>
	 <div class="col-md-offset-1">
         <a href="{{ route('unidad.index')}}" class="btn btn-primary">Vover a la lista</a>
     </div>
            
 @else
	 <div class="alert alert-info">
       Unidad de medida no encontrado
	   <br/><br/>
	   <a href="{{ route('unidad.index')}}" class="btn btn-primary">Volver</a>
     </div>
 @endif
@endsection