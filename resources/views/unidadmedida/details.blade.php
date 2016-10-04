@extends('layouts.template')

@section('content')

<div class="col-md-offset-1">
<h3>Detalle</h3>
</div>
<hr/>
 @if($unidad)
	 
     <dl class="dl-horizontal"> 
	    <dt>Unidad de medida: </dt> 
		<dd>{{ $unidad->nombre_unidadmedida}}</dd> 
	 </dl>
	 <div class="alert alert-info">
	     Articulos que pertenecen a esta unidad de medida<br/>
         @foreach($unidad->articulo as $art)
	         {{$art->nombre_articulo}}<br/>
	     @endforeach
	 </div>
	 <div class="col-md-offset-1">
         <a href="{{ route('unidad.index')}}" class="btn btn-primary">Vover a la lista</a>
     </div>
  @endif
 
@endsection