@extends('layouts.template')

@section('content')

<div class="col-md-offset-2">
    <h3>Nuevo Especifico</h3>
</div>
<hr/>      

{!! Form::open(array('route' => 'especifico.store','class' => 'form-horizontal','method' => 'post')) !!}
       
            <div class="form-group">
			    {!!Form::label('Numero', 'Numero', array('class' =>'control-label col-md-2' )) !!}
				<div class="col-md-7">
                    {!!Form::number('numero',null, array('placeholder' => '1234','class' => 'form-control')) !!}
					<div class="error">
					    <ul>@foreach($errors->get('numero') as $msg)<li>{{$msg}}</li> @endforeach</ul>
				    </div>
				</div>
            </div>
                    
            <div class="form-group">
                {!!Form::label('Titulo', 'Titulo', array('class' =>'control-label col-md-2' )) !!}
				<div class="col-md-7">
                    {!!Form::text('titulo', null, array('placeholder' => 'Quimicos','class' => 'form-control')) !!}
					<div class="error">
					    <ul>@foreach($errors->get('titulo') as $msg)<li>{{$msg}}</li> @endforeach</ul>
				    </div>
				</div>
            </div>
        
            <div class="form-group">
                {!!Form::label('Descripcion', 'Descripcion', array('class' =>'control-label col-md-2' )) !!}
				<div class="col-md-7">
                    {!!Form::textarea('descripcion',null,array( 'class' => 'form-control' )) !!}
					<div class="error">
					    <ul>@foreach($errors->get('descripcion') as $msg)<li>{{$msg}}</li> @endforeach</ul>
				    </div>
				</div>
            </div>
			
        <div class="form-group">
            <div class="col-md-offset-2 col-md-7">
                <button type="submit" class="btn btn-primary">Guardar</button>
				<a href="{{ route('especifico.index')}}" class="btn btn-primary">Cancelar</a>
            </div>
		</div>
    
{!! Form::close() !!}

@endsection