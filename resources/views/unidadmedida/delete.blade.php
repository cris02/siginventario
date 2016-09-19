@extends('layouts.template')

@section('content')

<br/>
<div class="col-md-offset-1">
<h3>Eliminar Unidad de medida</h3>
</div>
<hr/>
 @if($unidad)
	 <div class="col-md-offset-1">
	 <h4>Esta seguro que desea eliminar la siguiente unidad de medida?</h4>
	 </div>
     <dl class="dl-horizontal"> 
	    <dt>Unidad de medida: </dt> 
		   <dd>{{ $unidad->nombre_unidadmedida}}</dd> 
	 </dl>
	 {!! Form::open(['method' => 'DELETE','route' => ['unidad.destroy', $unidad->id_unidad_medida],'style'=>'display:inline']) !!}
	     <div class="col-md-offset-1">
            {!! Form::submit('Eliminar', ['class' => 'btn btn-primary']) !!}
			<a href="{{ route('unidad.index')}}" class="btn btn-primary">Cancelar</a>
		 </div>
            {!! Form::close() !!}
	 
 @else
	 <div class="alert alert-info">
       Unidad de medida no encontrada
	   <br/><br/>
	   <a href="{{ route('unidad.index')}}" class="btn btn-primary">Volver</a>
     </div>
     
 @endif
@endsection