@extends('layouts.template')

@section('content')

        <div class="box box-info container">
                <div class="box-header with-border">
                  <h3 class="box-title">DETALLE DE PROVEEDOR</h3>
                </div><!-- /.box-header -->
            

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
	                  		<a href="{{Route('proveedor.index')}}"><button type="button" id="cancelar" class="btn btn-default m-t-10">Regresar</button></a>
	                      
	                  </div><!-- /.box-footer -->
	              
               </div>
        </div><!-- /.box -->


 @endsection





