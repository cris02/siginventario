@extends('layouts.template')

@section('content')

              <div class="box box-info container">
                <div class="box-header with-border">
                  <h3 class="box-title">MODIFICAR DATOS DE DEPARTAMENTO/UNIDAD</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="form-horizontal">
	               {!!Form::model($department,['route'=>['departamento.update',$department->code],'method'=>'patch'])!!}
	                <input type="hidden" name="_token" value="{{ csrf_token() }}">
	                  <div class="box-body">
	                    
	                    <div class="form-group">
	                      <label for="depto/Unidad" class="col-sm-2 control-label">Departamento/Unidad</label>
	                      <div class="col-sm-6">
	                        <input type="text" class="form-control" id="name" name="name" value="{{$department->name}}">
	                      </div>
	                    </div>  
	              	                                
	                  </div><!-- /.box-body -->
	                  <div class="box-footer">
	                  			<a href="{{Route('departamento.index')}}"><button type="button" id="cancelar" class="btn btn-default m-t-10">Cancelar</button></a>
	                        <button type="submit" class="btn btn-info">Actualizar</button>
	                  </div><!-- /.box-footer -->
	               {!!Form::close()!!}
               </div>
              </div><!-- /.box -->




 @endsection
