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
	 	 
	<div class="panel panel-info">
	    <div class="panel-heading" role="tab">
			<h4 class="panel-title">
				<strong>Art&iacute;culos que pertenecen a esta unidad de medida</strong>
			</h4>
		</div>
		<div class="panel-body">
				<a href="{{route('articulo.index')}}" data-toggle="modal" class="btn btn-success btn-sm admin" >Ir a administracion de articulos</a>
				<ol>
				    @foreach($unidad->articulo as $art)
					    <li>
					         {{$art->nombre_articulo}}
					    </li>
	                @endforeach
				</ol>
					
	    </div>		    
				
	</div>
	 
	 <div class="col-md-offset-1">
         <a href="{{ route('unidad.index')}}" class="btn btn-primary">Vover a la lista</a>
     </div>
  @endif
 
@endsection