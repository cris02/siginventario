@extends('layouts.template')

@section('content')
<br/>
<div class="col-md-offset-2">
<h3>Nueva Unidad de medida</h3>
</div>

<hr/>
      @if($error = Session::get('flash_message'))
         <div class="alert alert-danger">
         {{$error}}
        </div>	
@endif
      @if($errors->any())
           <div class="alert alert-danger">
              @foreach($errors->all() as $error)
                   <p>{{ $error }}</p>
              @endforeach
           </div>
      @endif

{!! Form::open(array('route' => 'unidad.store','class' => 'form-horizontal','method' => 'post')) !!}
                
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!!Form::label('Unidad de medida', 'Unidad de medida', array('class' =>'col-md-2' )) !!}
                {!!Form::text('nombre_unidadmedida', null, array('placeholder' => 'Gramo,Litro','class' => 'form-control')) !!}
            </div>
        </div>
        
		
        <div class="col-md-offset-2">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    
{!! Form::close() !!}

@endsection