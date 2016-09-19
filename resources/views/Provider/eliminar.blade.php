@extends('layouts.template')

@section('content')

              <div class="box box-info container">
                <div class="box-header with-border">
                  <h3 class="box-title">CONFIRMA ELIMINAR EL SIGUIENTE PROVEEDOR</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="form-horizontal">
	               {!!Form::open(['route'=>['proveedor.destroy',$provider->id],'method'=>'DELETE'])!!}
	                <input type="hidden" name="_token" value="{{ csrf_token() }}">
	                  <div class="box-body">
	                  	<div class="form-group">
	                      <label for="id" class="col-sm-2 control-label">Numero</label>
	                      <div class="col-sm-6">
	                        <input type="text" class="form-control" id="id" name="id" value="{{$provider->id}}" readonly>
	                      </div>
	                    </div>	                    
	                    <div class="form-group">
	                      <label for="name" class="col-sm-2 control-label">Nombre</label>
	                      <div class="col-sm-6">
	                        <input type="text" class="form-control" id="name" name="name" value="{{$provider->name}}" readonly>
	                      </div>
	                    </div>   
	                    <div class="form-group">
	                      <label for="direction" class="col-sm-2 control-label">Direccion</label>
	                      <div class="col-sm-6">
	                        <input type="text" class="form-control" id="direction" name="direction" value="{{$provider->direction}}" readonly>
	                      </div>
	                    </div>
	                    <div class="form-group">
	                      <label for="phone" class="col-sm-2 control-label">Telefono</label>
	                      <div class="col-sm-6">
	                        <input type="text" class="form-control" id="phone" name="phone" value="{{$provider->phone}}" readonly>
	                      </div>
	                    </div>   
	                     <div class="form-group">
	                      <label for="fax" class="col-sm-2 control-label">Fax</label>
	                      <div class="col-sm-6">
	                        <input type="text" class="form-control" id="fax" name="fax" value="{{$provider->fax}}" readonly>
	                      </div>
	                    </div> 
	                    <div class="form-group">
	                      <label for="seller" class="col-sm-2 control-label">Vendedor</label>
	                      <div class="col-sm-6">
	                        <input type="text" class="form-control" id="seller" name="seller" value="{{$provider->seller}}" readonly>
	                      </div>
	                    </div>            
	                  </div><!-- /.box-body -->
	                  <div class="box-footer">
	                  		<a href="{{Route('proveedor.index')}}"><button type="button" id="cancelar" class="btn btn-default m-t-10">Cancelar</button></a>
	                        <button type="submit" class="btn btn-danger">Eliminar</button>
	                  </div><!-- /.box-footer -->
	               {!!Form::close()!!}
               </div>
              </div><!-- /.box -->


 @endsection





