@extends('layouts.template')

@section('content')

              <div class="box box-info container">
                <div class="box-header with-border">
                  <h3 class="box-title">CONFIRMA ELIMINAR EL SIGUIENTE DEPARTAMENTO</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="form-horizontal">
	               {!!Form::open(['route'=>['proveedor.destroy',$provider->id],'method'=>'DELETE'])!!}
	                <input type="hidden" name="_token" value="{{ csrf_token() }}">
	                  <div class="box-body">
	                  	<div class="form-group">
	                      <label for="code" class="col-sm-2 control-label">Codigo</label>
	                      <div class="col-sm-6">
	                        <input type="text" class="form-control" id="code" name="code" value="{{$departament->code}}" readonly>
	                      </div>
	                    </div>	                    
	                    <div class="form-group">
	                      <label for="depto/Unidad" class="col-sm-2 control-label">Departamento/Unidad</label>
	                      <div class="col-sm-6">
	                        <input type="text" class="form-control" id="depto/Unidad" name="depto/Unidad" value="{{$departament->depto/Unidad}}" readonly>
	                      </div>
	                    </div>   
	                    <div class="form-group">
	                      <label for="Jdepto" class="col-sm-2 control-label">Jefe de Departamento</label>
	                      <div class="col-sm-6">
	                        <input type="text" class="form-control" id="Jdepto" name="Jdepto" value="{{$departament->Jdepto}}" readonly>
	                      </div>
	                    </div>
	                    <div class="form-group">
	                      <label for="telefono" class="col-sm-2 control-label">Telefono</label>
	                      <div class="col-sm-6">
	                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{$departament->telefono}}" readonly>
	                      </div>
	                    </div>   
	                                 
	                  </div><!-- /.box-body -->
	                  <div class="box-footer">
	                  		<a href="{{Route('departamento.index')}}"><button type="button" id="cancelar" class="btn btn-default m-t-10">Cancelar</button></a>
	                        <button type="submit" class="btn btn-danger">Eliminar</button>
	                  </div><!-- /.box-footer -->
	               {!!Form::close()!!}
               </div>
              </div><!-- /.box -->


 @endsection





