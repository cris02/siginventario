@extends('layouts.template')

@section('content')
<br/>
<div class="col-md-offset-2">
<h3>Nuevo Especifico</h3>
</div>
<hr/>
      @if($errors->any())
           <div class="alert alert-danger">
              @foreach($errors->all() as $error)
                   <p>{{ $error }}</p>
              @endforeach
           </div>
      @endif

{!! Form::open(array('route' => 'especifico.store','class' => 'form-horizontal','method' => 'post')) !!}
       
            <div class="form-group">
			    {!!Form::label('Numero', 'Numero', array('class' =>'control-label col-md-2' )) !!}
				<div class="col-md-7">
                    {!!Form::number('numero_especifico',null, array('placeholder' => 'Numero','class' => 'form-control')) !!}
				</div>
            </div>
                    
            <div class="form-group">
                {!!Form::label('Titulo', 'Titulo', array('class' =>'control-label col-md-2' )) !!}
				<div class="col-md-7">
                    {!!Form::text('titulo_especifico', null, array('placeholder' => 'Titulo','class' => 'form-control')) !!}
				</div>
            </div>
        
            <div class="form-group">
                {!!Form::label('Descripcion', 'Descripcion', array('class' =>'control-label col-md-2' )) !!}
				<div class="col-md-7">
                    {!!Form::textarea('descripcion_especifico','prueba',array( 'class' => 'form-control' )) !!}
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