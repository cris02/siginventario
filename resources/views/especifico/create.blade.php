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

       

        <div class="col-xs-12 col-sm-12 col-md-9">
            <div class="form-group">
			    {!!Form::label('Numero', 'Numero', array('class' =>'col-md-2' )) !!}
                {!!Form::number('numero_especifico',null, array('placeholder' => 'Numero','class' => 'form-control')) !!}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-9">
            <div class="form-group">
                {!!Form::label('Titulo', 'Titulo', array('class' =>'col-md-2' )) !!}
                {!!Form::text('titulo_especifico', null, array('placeholder' => 'Titulo','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-9">
            <div class="form-group">
                {!!Form::label('Descripcion', 'Descripcion', array('class' =>'col-md-2' )) !!}
                {!!Form::textarea('descripcion_especifico','prueba' ) !!}
            </div>
        </div>
        <div class="col-md-offset-2">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>

    
{!! Form::close() !!}


@endsection