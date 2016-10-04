@extends('layouts.template')
@section('content')
    
    <div class="col-md-offset-2">
        <h3>Editar</h3>
    </div>
    <hr/>
    @if($especifico)
	    {!! Form::open(array('route' => ['especifico.update','id' => $especifico->id],'class' => 'form-horizontal','method' => 'put')) !!}
	
	        <div class="form-group">
                {!!Form::label('Especifico', 'Especifico', array('class' =>'control-label col-md-2' )) !!}
				<div class="col-md-7">
                    {!!Form::text('id_especifico', $especifico->id, array('placeholder' => 'Titulo','class' => 'form-control','disabled')) !!}
				</div>
            </div>
           
            <div class="form-group">
                {!!Form::label('Titulo', 'Titulo', array('class' =>'control-label col-md-2' )) !!}
				<div class="col-md-7">
                    {!!Form::text('titulo_especifico', $especifico->titulo_especifico, array('placeholder' => 'Titulo','class' => 'form-control')) !!}
				</div>
            </div>
                      
            <div class="form-group">
                {!!Form::label('Descripcion', 'Descripcion', array('class' =>'control-label col-md-2' )) !!}
				<div class="col-md-7">
                    {!!Form::textarea('descripcion_especifico',$especifico->descripcion_epecifico, array('class' => 'form-control')) !!}
				</div>
            </div>
			
           <div class="form-group">
               <div class="col-md-offset-2 col-md-7">
                   <button type="submit" class="btn btn-primary">Actualizar</button>
				   <a href="{{ route('especifico.index')}}" class="btn btn-primary">Cancelar</a>
               </div>
		   </div>

        {!! Form::close() !!}            
    
    @endif
@endsection