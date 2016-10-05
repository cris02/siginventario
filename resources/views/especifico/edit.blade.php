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
                    {!!Form::text('numero', $especifico->id, array('placeholder' => '1234','class' => 'form-control','disabled')) !!}
					<div class="error">
					    <ul>@foreach($errors->get('numero') as $msg)<li>{{$msg}}</li> @endforeach</ul>
				    </div>
				</div>
            </div>
           
            <div class="form-group">
                {!!Form::label('Titulo', 'Titulo', array('class' =>'control-label col-md-2' )) !!}
				<div class="col-md-7">
                    {!!Form::text('titulo', $especifico->titulo_especifico, array('placeholder' => 'Quimicos','class' => 'form-control')) !!}
					<div class="error">
					    <ul>@foreach($errors->get('titulo') as $msg)<li>{{$msg}}</li> @endforeach</ul>
				    </div>
				</div>
            </div>
                      
            <div class="form-group">
                {!!Form::label('Descripcion', 'Descripcion', array('class' =>'control-label col-md-2' )) !!}
				<div class="col-md-7">
                    {!!Form::textarea('descripcion',$especifico->descripcion_epecifico, array('class' => 'form-control')) !!}
					<div class="error">
					    <ul>@foreach($errors->get('descripcion') as $msg)<li>{{$msg}}</li> @endforeach</ul>
				    </div>
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