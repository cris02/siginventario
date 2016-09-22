@extends('layouts.template')

@section('content')

        <div class="box box-info container">
                <div class="box-header with-border">
                  <h3 class="box-title">CONFIRMA ELIMINAR EL SIGUIENTE PROVEEDOR</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="form-horizontal">
	               {!!Form::open(['route'=>['proveedor.destroy',$provider->id],'method'=>'DELETE'])!!}

	               		<div class="container">
							<table class="table table-hover table-striped">							
							  
							    <tr class="row">
							    <th class="col-xs-1">Numero</th>
							    <td class="col-xs-6">{{$provider->id}}</td>
							    <td class="col-xs-5"></td>
							    </tr>
							    <tr class="row">
							    <th class="col-xs-1">Nombre</th>
							    <td class="col-xs-6">{{$provider->name}}</td>
							    <td class="col-xs-5 "></td>
							    </tr>  
							     <tr class="row">
							    <th class="col-xs-1">Direccion</th>
							    <td class="col-xs-6">{{$provider->direction}}</td>
							    <td class="col-xs-5"></td>
							    </tr>  
							     <tr class="row">
							    <th class="col-xs-1">Telefono</th>
							    <td class="col-xs-6">{{$provider->phone}}</td>
							    <td class="col-xs-5"></td>
							    </tr>  
							     <tr class="row">
							    <th class="col-xs-1">Vendedor</th>
							    <td class="col-xs-6">{{$provider->seller}}</td>
							    <td class="col-xs-5"></td>
							    </tr>  
													         
												  
							</table>
						</div>
	            
	                  <div class="box-footer">
	                  		<a href="{{Route('proveedor.index')}}"><button type="button" id="cancelar" class="btn btn-default m-t-10">Cancelar</button></a>
	                        <button type="submit" class="btn btn-danger">Eliminar</button>
	                  </div><!-- /.box-footer -->
	               {!!Form::close()!!}
               </div>
        </div><!-- /.box -->


 @endsection





