@extends('layouts.template')

@section('content')

<div class="col-md-offset-2">
<h3>Nuevo Articulo</h3>
</div>
<hr/>      

{!! Form::open(array('route' => 'articulo.store','class' => 'form-horizontal','method' => 'post')) !!}                
        
            <div class="form-group">
                {!!Form::label('Codigo', 'Codigo', array('class' =>'col-md-2 control-label' )) !!}
				<div class="col-md-7">
                    {!!Form::text('codigo', null, array('placeholder' => 'ES001','class' => 'form-control')) !!}
				</div>
            </div>
			<div class="form-group">
                {!!Form::label('Nombre', 'Nombre', array('class' =>'col-md-2 control-label' )) !!}
				<div class="col-md-7">
                    {!!Form::text('nombre', null, array('placeholder' => 'Escoba, Azucar','class' => 'form-control')) !!}
				</div>
            </div>
			<div class="form-group">
                {!!Form::label('Especifico', 'Especifico', array('class' =>'col-md-2 control-label' )) !!}
				<div class="col-md-7">
                    {!!Form::text('especifico', null, array('placeholder' => '7845','class' => 'form-control')) !!}
				</div>
            </div>
			<div class="form-group">
                {!!Form::label('Unidad de medida', 'Unidad de medida', array('class' =>'col-md-2 control-label' )) !!}
				<div class="col-md-7">
				<select name="unidad" class="form-control">
				     @foreach ($unidades as $unidad)
					 <option value={{$unidad->id_unidad_medida}}>
				          {{$unidad->nombre_unidadmedida}}
					</option>
				     @endforeach
				</select>
				
				</div>
            </div>        
		<div class="form-group">
        <div class="col-md-offset-2 col-md-7">
                <button type="submit" class="btn btn-primary">Guardar</button>
				<a href="{{route('articulo.index')}}" class="btn btn-primary">Cancelar</a>
        </div>
		</div>
    
{!! Form::close() !!}

@endsection