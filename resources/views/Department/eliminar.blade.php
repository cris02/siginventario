@extends('layouts.template')

@section('content')

              <div class="box box-info container">
                <div class="box-header with-border">
                  <h3 class="box-title">CONFIRMA ELIMINAR EL SIGUIENTE DEPARTAMENTO</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="form-horizontal">
	               {!!Form::open(['route'=>['departamento.destroy',$department->code],'method'=>'DELETE'])!!}
	                <div class="container">
							<table class="table table-hover table-striped">							
							  
							    <tr class="row">
							    <th class="col-xs-1">CODIGO</th>
							    <td class="col-xs-6">{{$department->code}}</td>
							    <td class="col-xs-5"></td>
							    </tr>
							    <tr class="row">
							    <th class="col-xs-1">DEPARTAMENTO/UNIDAD</th>
							    <td class="col-xs-6">{{$department->name}}</td>
							    
													         
												  
							</table>
	                                 
	                  </div><!-- /.box-body -->
	                  <div class="box-footer">
	                  		<a href="{{Route('departamento.index')}}"><button type="button" id="cancelar" class="btn btn-default m-t-10">Cancelar</button></a>
	                        <button type="submit" class="btn btn-danger">Eliminar</button>
	                  </div><!-- /.box-footer -->
	               {!!Form::close()!!}
               </div>
              </div><!-- /.box -->


 @endsection





