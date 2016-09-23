@extends('layouts.template')

@section('content')

              <div class="box box-info container">
                <div class="box-header with-border">
                  <h3 class="box-title">MODIFICAR DATOS DE DEPARTAMENTO/UNIDAD</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="form-horizontal">
	               {!!Form::model($departament,['route'=>['departamento.update',$departament->code],'method'=>'patch'])!!}
	                <input type="hidden" name="_token" value="{{ csrf_token() }}">
	                  <div class="box-body">
	                    
	                    <div class="form-group">
	                      <label for="depto/Unidad" class="col-sm-2 control-label">Departamento/Unidad</label>
	                      <div class="col-sm-6">
	                        <input type="text" class="form-control" id="depto/Unidad" name="name" value="{{$departament->depto/Unidad}}">
	                      </div>
	                    </div>   
	                    <div class="form-group">
	                      <label for="Jdepto" class="col-sm-2 control-label">Jefe de Departamento</label>
	                      <div class="col-sm-6">
	                        <input type="text" class="form-control" id="Jdepto" name="Jdepto" value="{{$departament->Jdepto}}">
	                      </div>
	                    </div>
	                    <div class="form-group">
	                      <label for="telefono" class="col-sm-2 control-label">Telefono</label>
	                      <div class="col-sm-6">
	                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{$departament->telefono}}">
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

<!-- scrip -->
<script type="text/javascript" src="{{asset('plugins/jQuery/jQuery.js')}}"></script>

<script type="text/javascript">

   $(document).ready(function(){

           $('#phone').mask('9999-9999');    

    });

</script>


 @endsection
