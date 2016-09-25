@extends('layouts.template')

@section('content')

<br/>
<div class="col-md-offset-1">
<h3>Eliminar articulo</h3>
</div>
<hr/>
 @if($articulo)
	 <div class="col-md-offset-1">
	 <h4>Esta seguro que desea eliminar el siguiente articulo?</h4>
	 </div>
     <dl class="dl-horizontal"> 
	    <dt>Codigo: </dt> 
		   <dd>{{ $articulo->codigo_articulo}}
		</dd>
        <dt>Articulo: </dt> 
		   <dd>{{ $articulo->nombre_articulo}}
		</dd>		
	 </dl>
	 {!! Form::open(['method' => 'DELETE','route' => ['articulo.destroy', $articulo->codigo_articulo],'style'=>'display:inline']) !!}
	     <div class="col-md-offset-1">
            {!! Form::submit('Eliminar', ['class' => 'btn btn-primary']) !!}
			<a href="{{ route('articulo.index')}}" class="btn btn-primary">Cancelar</a>
		 </div>
            {!! Form::close() !!}
	 
 @else
	 <div class="alert alert-info">
       Articulo no encontrada
	   <br/><br/>
	   <a href="{{ route('articulo.index')}}" class="btn btn-primary">Volver</a>
     </div>
     
 @endif
@endsection