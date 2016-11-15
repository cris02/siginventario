@extends('layouts.template')

@section('content')

<div class="col-md-offset-2">
<h3>Nueva transaccion de ingreso</h3>
</div>
<hr/>      

{!! Form::open(array('route' => 'ingreso.store','class' => 'form-horizontal','method' => 'post')) !!} 

            <div class="form-group">
                {!!Form::label('Presentacion', 'Presentacion', array('class' =>'col-md-2 control-label' )) !!}
				<div class="col-md-7">
				<select name="presentacion" class="form-control">
				     @foreach ($presentaciones as $presentacion)
					 <option value={{$presentacion->id_pres}}>
				          {{$presentacion->presentacion}}
					</option>
				     @endforeach
				</select>
				<div class="error">
					    <ul>@foreach($errors->get('producto') as $msg)<li>{{$msg}}</li> @endforeach</ul>
				    </div>
				</div>
            </div>
			

            <div class="form-group">
                {!!Form::label('Producto', 'Producto', array('class' =>'col-md-2 control-label' )) !!}
				<div class="col-md-7">
				<select name="producto" class="form-control">
				     @foreach ($articulos as $articulo)
					 <option value={{$articulo->codigo_articulo}}>
				          {{$articulo->nombre_articulo}}
					</option>
				     @endforeach
				</select>
				<div class="error">
					    <ul>@foreach($errors->get('producto') as $msg)<li>{{$msg}}</li> @endforeach</ul>
				    </div>
				</div>
            </div>			
			
			<div class="form-group">
                {!!Form::label('Proveedor', 'Proveedor', array('class' =>'col-md-2 control-label' )) !!}
				<div class="col-md-7">
				<select name="proveedor" class="form-control">
				     @foreach ($proveedores as $proveedor)
					 <option value={{$proveedor->id}}>
				          {{$proveedor->name}}
					</option>
				     @endforeach
				</select>
				<div class="error">
					    <ul>@foreach($errors->get('proveedor') as $msg)<li>{{$msg}}</li> @endforeach</ul>
				    </div>
				</div>
            </div>
        
            <div class="form-group">
                {!!Form::label('Fecha', 'Fecha', array('class' =>'col-md-2 control-label' )) !!}
				<div class="col-md-7">
                    {!!Form::date('fecha', \Carbon\Carbon::now(), array('placeholder' => 'ES001','class' => 'form-control')) !!}
					<div class="error">
					    <ul>@foreach($errors->get('fecha') as $msg)<li>{{$msg}}</li> @endforeach</ul>
				    </div>
				</div>
            </div>
			<div class="form-group">
                {!!Form::label('Cantidad', 'Cantidad', array('class' =>'col-md-2 control-label' )) !!}
				<div class="col-md-7">
                    {!!Form::number('cantidad', null, array('placeholder' => 'Escoba, Azucar','class' => 'form-control')) !!}
					<div class="error">
					    <ul>@foreach($errors->get('cantidad') as $msg)<li>{{$msg}}</li> @endforeach</ul>
				    </div>
				</div>
            </div>
			<div class="form-group">
                {!!Form::label('Precio unitario', 'Precio', array('class' =>'col-md-2 control-label' )) !!}
				<div class="col-md-7">
                    {!!Form::text('precio', null, array('placeholder' => '7845','class' => 'form-control')) !!}
					<div class="error">
					    <ul>@foreach($errors->get('precio') as $msg)<li>{{$msg}}</li> @endforeach</ul>
				    </div>
				</div>
            </div>
			        
		<div class="form-group">
        <div class="col-md-offset-2 col-md-7">
                <button type="submit" class="btn btn-primary">Guardar</button>
				<a href="{{route('ingreso.index')}}" class="btn btn-primary">Cancelar</a>
        </div>
		</div>
    
{!! Form::close() !!}

@endsection
