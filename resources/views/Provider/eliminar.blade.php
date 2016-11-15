@extends('layouts.template')

@section('content')


<div class="panel-body table-responsive">
       
                <div class="box-header with-border">
                  <h3 class="box-title">CONFIRMA ELIMINAR EL SIGUIENTE PROVEEDOR</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="form-horizontal">
	               {!!Form::open(['route'=>['proveedor.destroy',$provider->id],'method'=>'DELETE'])!!}

	               		<div class="panel panel-default">
							<table class="table table-hover ">							
							  
							    <tr class="row">
							    <th class="col-xs-1">Numero</th>
							    <td class="col-xs-6">{{$provider->id}}</td>
							    <td class="col-xs-5"></td>
							    </tr>
							    <tr class="row">
							    <th class="col-xs-1">Nombre</th>
							    <td class="col-xs-6">{{$provider->nombre}}</td>
							    <td class="col-xs-5 "></td>
							    </tr>  
							     <tr class="row">
							    <th class="col-xs-1">Direccion</th>
							    <td class="col-xs-6">{{$provider->direccion}}</td>
							    <td class="col-xs-5"></td>
							    </tr>  
							     <tr class="row">
							    <th class="col-xs-1">Telefono</th>
							    <td class="col-xs-6">{{$provider->telefono}}</td>
							    <td class="col-xs-5"></td>
							    </tr> 
							    <tr class="row">
							    <th class="col-xs-1">Fax</th>
							    <td class="col-xs-6">{{$provider->fax}}</td>
							    <td class="col-xs-5"></td>
							    </tr> 
							     <tr class="row">
							    <th class="col-xs-1">Correo</th>
							    <td class="col-xs-6">{{$provider->email}}</td>
							    <td class="col-xs-5"></td>
							    </tr>
							     <tr class="row">
							    <th class="col-xs-1">Vendedor</th>
							    <td class="col-xs-6">{{$provider->vendedor}}</td>
							    <td class="col-xs-5"></td>
							    </tr>  
													         
												  
							</table>
						</div>
	            
	                  <div class="">
	                  		<a href="{{Route('proveedor.index')}}"><button type="button" id="cancelar" class="btn btn-default m-t-10">Cancelar</button></a>
	                        <button type="submit" class="btn btn-danger">Eliminar</button>
	                  </div><!-- /.box-footer -->
	               {!!Form::close()!!}
               </div>
       

</div>
 @endsection





