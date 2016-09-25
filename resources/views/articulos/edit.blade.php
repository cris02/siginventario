@extends('layouts.template')
@section('content')

    <br/>
    <div class="col-md-offset-2">
        <h3>Editar</h3>
    </div>
    <hr/>
    @if($articulo)
	    {!! Form::open(array('route' => ['articulo.update','codigo_articulo' => $articulo->codigo_articulo],'class' => 'form-horizontal','method' => 'put')) !!}
           
		    <div class="form-group">
                {!!Form::label('Codigo articulo', 'Codigo articulo', array('class' =>'control-label col-md-2' )) !!}
				<div class="col-md-7">
                    {!!Form::text('codigo_articulo', $articulo->codigo_articulo, array('placeholder' => 'Titulo','class' => 'form-control','disabled')) !!}
				</div>
            </div>
           
			<div class="form-group">
                {!!Form::label('Nombre', 'Nombre', array('class' =>'col-md-2 control-label' )) !!}
				<div class="col-md-7">
                    {!!Form::text('nombre', $articulo->nombre_articulo, array('placeholder' => 'Escoba, Azucar','class' => 'form-control')) !!}
				</div>
            </div>
			<div class="form-group">
                {!!Form::label('Especifico', 'Especifico', array('class' =>'col-md-2 control-label' )) !!}
				<div class="col-md-7">
                    {!!Form::text('especifico', $articulo->id_especifico, array('placeholder' => '7845','class' => 'form-control')) !!}
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
				
				</div>
            </div>
        
        
		
        <div class="col-md-offset-2 col-md-7">
                <button type="submit" class="btn btn-primary">Actualizar</button>
				<a href="{{route('articulo.index')}}" class="btn btn-primary">Cancelar</a>
        </div>

        {!! Form::close() !!}

            
    @else
	 <div class="alert alert-info">
       Unidad de medida no encontrado
	   <br/><br/>
	   <a href="{{ route('unidad.index')}}" class="btn btn-primary">Volver</a>
     </div>
    @endif
@endsection