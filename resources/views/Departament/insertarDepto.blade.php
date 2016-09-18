@extends('layouts.template')

@section('content')

<!-- Horizontal Form -->
              <div class="box box-info container">
                <div class="box-header with-border container">
                  <h3 class="box-title">INGRESAR NUEVO DEPARTAMENTO/h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="form-horizontal">
                  {!!Form::open(['route'=>'departamento.store','method'=>'POST'])!!}           
                
                    <div class="box-body">
                      <div class="form-group">
                          <label for="code" class="col-sm-2 control-label">Numero</label>
                          <div class="col-sm-6">
                            <input type="number" min="0" class="form-control" id="code" name="code" placeholder="Ingrese el codigo del departamento" autofocus="on" required>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="depto/Unidad" class="col-sm-2 control-label">Depto/Unidad</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="depto/Unidad" name="depto/Unidad" placeholder="Digite nombre del Departamento/Unidad" required>
                          </div>
                      </div>   
                      <div class="form-group">
                          <label for="Jdepto" class="col-sm-2 control-label">Jefe de Departamento</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="Jdepto" name="direction" placeholder="Digite el Jefe de Departamento">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="telefono" class="col-sm-2 control-label">Telefono</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="telefono" name="phone" placeholder="ejemplo 9999-9999" required>
                          </div>
                      </div>   
                       
                    </div><!-- /.box-body -->                    
                        <div class="box-footer col-sm-offset-2">
                          	<a href="{{Route('departamento.index')}}"><button type="button" id="cancelar" class="btn btn-default m-t-10">Cancelar</button></a>
                            {!!Form::submit('Aceptar',['name'=>'aceptar','id'=>'aceptar','content'=>'<span>Acpetar</span>','class'=>'btn btn-info'])!!}
                           
                        </div>   
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