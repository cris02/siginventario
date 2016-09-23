@extends('layouts.template')
@section('content')

    <br/>
    <div class="col-md-offset-2">
        <h3>Editar</h3>
    </div>
    <hr/>
    @if($unidad)
	    {!! Form::open(array('route' => ['unidad.update','id_unidad_medida' => $unidad->id_unidad_medida],'class' => 'form-horizontal','method' => 'put')) !!}

           
            <div class="form-group">
                {!! Form::label('Unidad de medida', 'Unidad de medida', array('class' =>'control-label col-md-2' )) !!}
				<div class="col-md-7">
                    {!!Form::text('nombre_unidadmedida', $unidad->nombre_unidadmedida, array('placeholder' => 'Gramo,Litro','class' => 'form-control')) !!}
				</div>
            </div>
        
        
		<div class="form-group">
            <div class="col-md-offset-2 col-md-7">
                <button type="submit" class="btn btn-primary">Actualizar</button>
				<a href="{{route('unidad.index')}}" class="btn btn-primary">Cancelar</a>
            </div>
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