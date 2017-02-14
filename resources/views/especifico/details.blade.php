@extends('layouts.template')

@section('content')

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
	 	 
	<div class="panel panel-info">
	    <div class="panel-heading" role="tab">
			<h4 class="panel-title">
				<strong>Art&iacute;culos que pertenecen a este especifico</strong>
			</h4>
		</div>
		<div class="panel-body">				
				<ol>
				    @foreach($especifico->articulo as $art)
					    <li>
					         {{$art->nombre_articulo}}
					    </li>
	                @endforeach
				</ol>			
	    </div>					
	</div>
	 
	 <div class="col-md-offset-1">
         <a href="{{ route('especifico.index')}}" class="btn btn-primary">Vover a la lista</a>
     </div>     
  @endif	 
 
@endsection