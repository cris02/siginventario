@extends('layouts.template')

@section('content')

        <div class="table-responsive">
                <div class="box-header with-border">
                  <h3 class="box-title">DETALLE DE PROVEEDOR</h3>
                </div><!-- /.box-header -->
            

	               		<div class="panel panel-default">
							<table class="table table-hover table-bordered table-condensed">							
							  
							    <tr >
							    <th class="col-xs-1">Numero</th>
							    <td class="col-xs-6">{{$provider->id}}</td>							   
							    </tr>

							    <tr >
							    <th class="col-xs-1">Nombre</th>
							    <td class="col-xs-6">{{$provider->nombre}}</td>							   
							    </tr>  

							     <tr >
							    <th class="col-xs-1">Direccion</th>
							    <td class="col-xs-6">{{$provider->direccion}}</td>							    
							    </tr>

							    <tr >
							    <th class="col-xs-1">Telefono</th>
							    <td class="col-xs-6">{{$provider->telefono}}</td>							   
							    </tr> 

							    <tr >
							    <th class="col-xs-1">Fax</th>
							    <td class="col-xs-6">{{$provider->fax}}</td>							
							    </tr> 

							    <tr >
							    <th class="col-xs-1">Correo</th>
							    <td class="col-xs-6">{{$provider->email}}</td>							
							    </tr>    

							     <tr >
							    <th class="col-xs-1">Vendedor</th>
							    <td class="col-xs-6">{{$provider->vendedor}}</td>							
							    </tr>  
													         
												  
							</table>
						</div>
	            
	                  <div class="">
	                  		<a href="{{Route('proveedor.index')}}"><button type="button" id="cancelar" class="btn btn-default m-t-10">Regresar</button></a>
	                      
	                  </div><!-- /.box-footer -->
	              
               </div>
        </div><!-- /.box -->


 @endsection





