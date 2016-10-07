@extends('layouts.template')

@section('content')

<div class="col-md-offset-2">
    <h3>Nuevo departamento</h3>
</div>
<hr/>
      
{!! Form::open(array('route' => 'departamento.store','class' => 'form-horizontal','method' => 'post')) !!}   
       <div class="form-group">
            {!!Form::label('Codigo', 'Codigo', array('class' =>'control-label col-md-2' )) !!}
            <div class="col-md-7">
                {!!Form::text('code', null, array('placeholder' => 'Codigo','class' => 'form-control')) !!}
                <div class="error">
                    <ul>@foreach($errors->get('code') as $msg)<li>{{$msg}}</li> @endforeach</ul>
                </div>
            </div>
        </div>            
        
        <div class="form-group">
            {!!Form::label('Nombre', 'Nombre', array('class' =>'control-label col-md-2' )) !!}
            <div class="col-md-7">
                {!!Form::text('name', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
                <div class="error">
                    <ul>@foreach($errors->get('name') as $msg)<li>{{$msg}}</li> @endforeach</ul>
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