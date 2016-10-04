@extends('layouts.template')

@section('content')

<div class="col-md-offset-2">
    <h3>Nueva Unidad de medida</h3>
</div>
<hr/>
      
{!! Form::open(array('route' => 'unidad.store','class' => 'form-horizontal','method' => 'post')) !!}               
        
        <div class="form-group">
            {!!Form::label('Unidad de medida', 'Unidad de medida', array('class' =>'control-label col-md-2' )) !!}
			<div class="col-md-7">
                {!!Form::text('nombre_unidadmedida', null, array('placeholder' => 'Gramo,Litro','class' => 'form-control')) !!}
				<div class="error">
					<ul>@foreach($errors->get('nombre_unidadmedida') as $msg)<li>{{$msg}}</li> @endforeach</ul>
				</div>
			</div>
        </div>        
        
		<div class="form-group">
            <div class="col-md-offset-2 col-md-7">
                <button type="submit" class="btn btn-primary">Guardar</button>
				<a href="{{route('unidad.index')}}" class="btn btn-primary">Cancelar</a>
            </div>
		</div>
    
{!! Form::close() !!}

@endsection