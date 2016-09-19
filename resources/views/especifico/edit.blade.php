@extends('layouts.template')
@section('content')

    <br/>
    <div class="col-md-offset-2">
        <h3>Editar</h3>
    </div>
    <hr/>
    @if($especifico)
	    {!! Form::open(array('route' => ['especifico.update','id' => $especifico->id],'class' => 'form-horizontal','method' => 'put')) !!}

           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!!Form::label('Titulo', 'Titulo', array('class' =>'col-md-2' )) !!}
                {!!Form::text('titulo_especifico', $especifico->titulo_especifico, array('placeholder' => 'Titulo','class' => 'form-control')) !!}
            </div>
           </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!!Form::label('Descripcion', 'Descripcion', array('class' =>'col-md-2' )) !!}
                {!!Form::textarea('descripcion_especifico',$especifico->descripcion_epecifico ) !!}
            </div>
           </div>
           <div class="col-md-offset-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
				<a href="{{ route('especifico.index')}}" class="btn btn-primary">Cancelar</a>
           </div>

        {!! Form::close() !!}

            
    @else
	 <div class="alert alert-info">
       Especifico no encontrado
	   <br/><br/>
	   <a href="{{ route('especifico.index')}}" class="btn btn-primary">Volver</a>
     </div>
    @endif
@endsection