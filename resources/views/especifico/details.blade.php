@extends('layouts.template')

@section('content')

<br/>
<div class="col-md-offset-1">
<h3>Detalle</h3>
</div>
<hr/>
 @if($especifico)
	 
     <dl class="dl-horizontal"> 
	    <dt>Numero: </dt> 
		   <dd>{{ $especifico->id}}</dd> 
		<dt>Titulo: </dt> 
		   <dd>{{ $especifico->titulo_especifico }}</dd>
	    <dt>Descripcion: </dt> 
		   <dd>{{ $especifico->descripcion_epecifico }}</dd>
	 </dl>
	 
	 <div class="col-md-offset-1">
         <a href="{{ route('especifico.index')}}" class="btn btn-primary">Vover a la lista</a>
     </div>
            
 @else
	 <div class="alert alert-info">
       Especifico no encontrado
	   <br/><br/>
	   <a href="{{ route('especifico.index')}}" class="btn btn-primary">Volver</a>
     </div>
 @endif
@endsection