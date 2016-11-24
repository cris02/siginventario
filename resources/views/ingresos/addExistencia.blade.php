@extends('layouts.template')

@section('content') 
    
    <div class="panel panel-success">
	<div class="panel-heading" role="tab">
	<h2 class="panel-title">
	<strong>Agregar existencia</strong>
	</h2>
	</div>
	<div class="panel-body">
	  
	    <div class="information">
	    <strong>Producto: </strong>{{$existencia->articulo->nombre_articulo}}<br/>
		<strong>Presentacion: </strong>{{$existencia->presentacion->presentacion}}<br/>
		<Strong>Existencia: </strong>{{$existencia->existencia}}<br/>
		<strong>Precio: </strong>{{number_format($existencia->precio_unitario,2,'.','')}}<br/>
		<strong>Monto: </strong>{{number_format($existencia->monto(),2,'.','')}}
			
		<hr/>
		</div>
	  
        {!! Form::open(array('route' => 'ingreso.store','class' => 'form-horizontal','method' => 'post')) !!} 
                  				
            {!!Form::hidden('presentacion',$existencia->presentacion->id_pres, array('placeholder' => '')) !!}
					                      
			{!!Form::hidden('producto', $existencia->articulo->codigo_articulo, array('placeholder' => '')) !!}
			     
            <div class="form-group">
                {!!Form::label('Proveedor', 'Proveedor', array('class' =>'col-md-2 control-label' )) !!}
				<div class="col-md-7">
				<select name="proveedor" class="form-control">
				     @foreach ($proveedores as $proveedor)
					 <option value={{$proveedor->id}}>
				          {{$proveedor->nombre}}
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
				
                    {!!Form::date('fecha', null, array('placeholder' => '2016-11-20','class' => 'form-control calendario')) !!}
				
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
				<a href="{{route('existencia.index')}}" class="btn btn-primary">Cancelar</a>
        </div>
		</div>
		{!!Form::hidden('mostrar', "existenciaindex", array('placeholder' => '')) !!}
    
{!! Form::close() !!}
</div>
</div>
 <script>
         $(function() {
            $( ".calendario" ).datepicker({
               appendText:"(yy-mm-dd)",
               dateFormat:"yy-mm-dd",
               
            });
         });
 </script>
@endsection
