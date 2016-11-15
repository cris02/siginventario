@extends('layouts.template')

@section('content')


<div class="col-md-offset-1">
    <h3>Eliminar Departamento</h3>
</div>
<hr/>
    @if($department)
	 
	    <div class="col-md-offset-1">
	        <h4>Esta seguro que desea eliminar el departamento?</h4>
	    </div>
        <dl class="dl-horizontal col-md-offset-1"> 
	        <dt>Departamento: </dt> 
		    <dd>{{ $department->name}}</dd>	
		    <dt>Descripcion: </dt> 
		    <dd>{{ $department->descripcion}}</dd>
		    <dt>Encargado: </dt> 
		    <dd>{{ $department->encargado}}</dd>		   	   
	    <dl>
	    {!! Form::open(['method' => 'DELETE','route' => ['departamento.destroy', $department->id],'style'=>'display:inline']) !!}
	        <div>
                {!! Form::submit('Eliminar', ['class' => 'btn btn-primary']) !!}
			    <a href="javascript:window.history.back();" class="btn btn-primary">Cancelar</a>
		    </div>
        {!! Form::close() !!}
    @endif
@endsection