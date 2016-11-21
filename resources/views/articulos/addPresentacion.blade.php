@extends('layouts.template')

@section('content') 
    
    <div class="panel panel-success">
	<div class="panel-heading" role="tab">
	<h2 class="panel-title">
	<strong>Agregar Presentacion</strong>
	</h2>
	</div>
	<div class="panel-body">
	  
	    <div class="information">
	    <strong>Producto: </strong>{{$articulo->nombre_articulo}}<br/>
		<strong>Unidad de Medida: </strong>{{$articulo->unidad->nombre_unidadmedida}}<br/>
		<strong>Especifico: </strong>{{$articulo->especifico->id}}<br/>
		<strong>Presentaciones existentes:</strong>
		<ol>
		@foreach($articulo->existencia as $existencia)
		    <li>{{$existencia->presentacion->presentacion}}</li>
		@endforeach
		</ol>	
		<hr/>
		</div>
	  
        {!! Form::open(array('route' => 'existencia.store','class' => 'form-horizontal','method' => 'post')) !!} 
                       
					                      
			{!!Form::hidden('producto', $articulo->codigo_articulo, array('placeholder' => '')) !!}
			     
            <div class="form-group">
                {!!Form::label('Presentacion', 'Presentacion', array('class' =>'col-md-2 control-label' )) !!}
				<div class="col-md-7">
				<select name="presentacion" class="form-control">
				     @foreach ($presentaciones as $presentacion)
					 <option value={{$presentacion->id_pres}}>
				          {{$presentacion->presentacion}}
					</option>
				     @endforeach
				</select>
				<div class="error">
					    <ul>@foreach($errors->get('presentacion') as $msg)<li>{{$msg}}</li> @endforeach</ul>
				    </div>
				</div>
            </div>
             
			
			
			        
		<div class="form-group">
        <div class="col-md-offset-2 col-md-7">
                <button type="submit" class="btn btn-primary">Agregar</button>
				<a href="{{route('existencia.index')}}" class="btn btn-primary">Cancelar</a>
        </div>
		</div>
		{!!Form::hidden('mostrar', "existenciaindex", array('placeholder' => '')) !!}
    
{!! Form::close() !!}
</div>
</div>

@endsection
