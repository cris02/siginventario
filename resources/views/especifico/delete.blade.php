@extends('layouts.template')

@section('content')

<br/>
<div class="col-md-offset-1">
<h3>Eliminar Especifico</h3>
</div>
<hr/>
 @if($especifico)
	 <div class="col-md-offset-1">
	 <h4>Esta seguro que desea eliminar el siguiente especifico?</h4>
	 </div>
     <dl class="dl-horizontal"> 
	    <dt>Codigo: </dt> 
		   <dd>{{ $especifico->id}}</dd> 
		<dt>Titulo: </dt> 
		   <dd>{{ $especifico->titulo_especifico }}</dd>
	    <dt>Descripcion: </dt> 
		   <dd>{{ $especifico->descripcion_epecifico }}</dd>
	 </dl>
	 {!! Form::open(['method' => 'DELETE','route' => ['especifico.destroy', $especifico->id],'style'=>'display:inline']) !!}
	     <div class="col-md-offset-1">
            {!! Form::submit('Delete', ['class' => 'btn btn-primary']) !!}
			<a href="{{ route('especifico.index')}}" class="btn btn-primary">Cancelar</a>
		 </div>
            {!! Form::close() !!}
	 
 @else
	 <div class="alert alert-info">
       Especifico no encontrado
	   <br/><br/>
	   <a href="{{ route('especifico.index')}}" class="btn btn-primary">Volver</a>
     </div>
     
 @endif
@endsection