@extends('layouts.template')
@section('content')
    
    <div class="col-md-offset-2">
        <h3>Editar</h3>
    </div>
    
    @if($department)
	    {!! Form::open(array('route' => ['departamento.update','code' => $department->code],'class' => 'form-horizontal','method' => 'put')) !!}
        <div class="form-group">
                {!! Form::label('Departamento', 'Departamento', array('class' =>'control-label col-md-2' )) !!}
                <div class="col-md-7">
                    {!!Form::text('name', $department->code, array('placeholder' => '','class' => 'form-control','disabled')) !!}
                
                </div>
            </div>

           
            <div class="form-group">
                {!! Form::label('Departamento', 'Departamento', array('class' =>'control-label col-md-2' )) !!}
				<div class="col-md-7">
                    {!!Form::text('name', $department->name, array('placeholder' => '','class' => 'form-control')) !!}
				<div class="error">
					<ul>@foreach($errors->get('name') as $msg)<li>{{$msg}}</li> @endforeach</ul>
				</div>
				</div>
            </div>        
        
		    <div class="form-group">
                <div class="col-md-offset-2 col-md-7">
                <button type="submit" class="btn btn-primary">Actualizar</button>
				<a href="{{route('departamento.index')}}" class="btn btn-primary">Cancelar</a>
                </div>
		    </div>
			
        {!! Form::close() !!} 
    @endif		
    
@endsection