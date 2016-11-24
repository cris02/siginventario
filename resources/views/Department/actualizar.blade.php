@extends('layouts.template')
@section('content')
    
    <div class="col-md-offset-2">
        <h3>Editar</h3>
    </div>
    
    @if($department)
	    {!! Form::open(array('route' => ['departamento.update','id' => $department->id],'class' => 'form-horizontal','autocomplete'=>'off','method' => 'put')) !!}
        <div class="form-group">
                {!! Form::label('numero', 'Numero', array('class' =>'control-label col-md-2' )) !!}
                <div class="col-md-7">
                    {!!Form::text('numero', $department->id, array('placeholder' => '','class' => 'form-control','disabled')) !!}
                
                </div>
            </div>

           
            <div class="form-group">
                {!! Form::label('name', 'Nombre', array('class' =>'control-label col-md-2' )) !!}
				<div class="col-md-7">
                    {!!Form::text('name', $department->name, array('placeholder' => '','class' => 'form-control')) !!}
				<div class="error">
					<ul>@foreach($errors->get('name') as $msg)<li>{{$msg}}</li> @endforeach</ul>
				</div>
				</div>
            </div>  
            <div class="form-group">
                {!! Form::label('descripcion', 'Descripcion', array('class' =>'control-label col-md-2' )) !!}
                <div class="col-md-7">
                    {!!Form::text('descripcion', $department->descripcion, array('placeholder' => '','class' => 'form-control')) !!}
                <div class="error">
                    <ul>@foreach($errors->get('descripcion') as $msg)<li>{{$msg}}</li> @endforeach</ul>
                </div>
                </div>
            </div>                 
        
		    <div class="form-group">
                <div class="col-md-offset-2 col-md-7">
                <button type="submit" class="btn btn-primary">Actualizar</button>
				<a href="javascript:window.history.back();" class="btn btn-primary">Cancelar</a>
                </div>
		    </div>
			
        {!! Form::close() !!} 
    @endif		
    
@endsection