@extends('layouts.template')
@section('content')
    
    <div class="col-md-offset-2">
        <h3>Editar</h3>
    </div>
    <hr/>
    @if($articulo)
	    {!! Form::open(array('route' => ['articulo.update','codigo_articulo' => $articulo->codigo_articulo],'class' => 'form-horizontal','method' => 'put')) !!}
           
		    <div class="form-group">
                {!!Form::label('Codigo articulo', 'Codigo articulo', array('class' =>'control-label col-md-2' )) !!}
				<div class="col-md-7">
                    {!!Form::text('codigo', $articulo->codigo_articulo, array('placeholder' => 'EE001','class' => 'form-control','disabled')) !!}					
				</div>
            </div>
           
			<div class="form-group">
                {!!Form::label('Nombre', 'Nombre', array('class' =>'col-md-2 control-label' )) !!}
				<div class="col-md-7">
                    {!!Form::text('nombre', $articulo->nombre_articulo, array('placeholder' => 'Escoba, Azucar','class' => 'form-control')) !!}
					<div class="error">
					    <ul>@foreach($errors->get('nombre') as $msg)<li>{{$msg}}</li> @endforeach</ul>
				    </div>
				</div>
            </div>
			<div class="form-group">
                {!!Form::label('Especifico', 'Especifico', array('class' =>'col-md-2 control-label' )) !!}
				<div class="col-md-7">
                    {!!Form::text('especifico', $articulo->id_especifico, array('placeholder' => '7845','class' => 'form-control')) !!}
					<div class="error">
					    <ul>@foreach($errors->get('especifico') as $msg)<li>{{$msg}}</li> @endforeach</ul>
				    </div>
				</div>
            </div>
			<div class="form-group">
                {!!Form::label('Unidad de medida', 'Unidad de medida', array('class' =>'col-md-2 control-label' )) !!}
				<div class="col-md-7">
				<select name="unidad" class="form-control">
				     @foreach ($unidades as $unidad)
					   @if($unidad->id_unidad_medida == $articulo->id_unidad_medida)
						   <option selected value={{$unidad->id_unidad_medida}} >
				              {{$unidad->nombre_unidadmedida}}
					       </option>
					   @else
						   <option value={{$unidad->id_unidad_medida}}>
				              {{$unidad->nombre_unidadmedida}}
					       </option>
					   @endif
					 
				     @endforeach
				</select>
                    <div class="error">
					    <ul>@foreach($errors->get('unidad') as $msg)<li>{{$msg}}</li> @endforeach</ul>
				    </div>				
				</div>
            </div>  
        <div class="form-group">		
        <div class="col-md-offset-2 col-md-7">
		    
                <button type="submit" class="btn btn-primary">Actualizar</button>
				<a href="{{route('articulo.index')}}" class="btn btn-primary">Cancelar</a>
			
        </div>
		</div>

    {!! Form::close() !!}    
  @endif	
    
@endsection