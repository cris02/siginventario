@extends('layouts.template')

@section('content')

<div class="col-md-offset-2">
<h3>Nuevo Articulo</h3>
</div>
<hr/>      

{!! Form::open(array('route' => 'articulo.store','class' => 'form-horizontal','method' => 'post')) !!}                
        
            
			<div class="form-group">
                {!!Form::label('Nombre', 'Nombre', array('class' =>'col-md-2 control-label' )) !!}
				<div class="col-md-7">
                    {!!Form::text('nombre', null, array('placeholder' => 'Escoba, Azucar','class' => 'form-control')) !!}
					<div class="error">
					    <ul>@foreach($errors->get('nombre') as $msg)<li>{{$msg}}</li> @endforeach</ul>
				    </div>
				</div>
            </div>
						
			<div class="form-group">
                {!!Form::label('Especifico', 'Especifico', array('class' =>'col-md-2 control-label' )) !!}
				<div class="col-md-7">
				<select name="especifico" class="form-control">
				     @foreach ($especificos as $especifico)
					 <option value={{$especifico->id}}>
				          {{$especifico->getEspecificoTitulo()}}
					</option>
				     @endforeach
				</select>
				<div class="error">
					    <ul>@foreach($errors->get('especifico') as $msg)<li>{{$msg}}</li> @endforeach</ul>
				    </div>
				</div>
            </div>  
			
			<div class="form-group">
                {!!Form::label('Unidad de medida', 'Unidad de medida', array('class' =>'col-md-2 control-label' )) !!}
				<div class="col-md-7">
				<select name="unidad" class="form-control">
				     @foreach ($unidades as $unidad)
					 <option value={{$unidad->id_unidad_medida}}>
				          {{$unidad->nombre_unidadmedida}}
					</option>
				     @endforeach
				</select>
				<div class="error">
					    <ul>@foreach($errors->get('unidad') as $msg)<li>{{$msg}}</li> @endforeach</ul>
				    </div>
				</div>
            </div>        
		<div class="form-group">
        <div class="col-md-offset-2 col-md-7">
                <button type="submit" class="btn btn-primary">Guardar</button>
				<a href="{{route('articulo.index')}}" class="btn btn-primary">Cancelar</a>
        </div>
		</div>
    
{!! Form::close() !!}

@endsection