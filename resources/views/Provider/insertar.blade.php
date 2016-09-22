@extends('layouts.template')

@section('content')

<!-- Horizontal Form -->
              <div class="box box-info container">
                <div class="box-header with-border container">
                  <h3 class="box-title">INGRESAR NUEVO PROVEEDOR</h3>
                </div><!-- /.box-header -->
              
                  @include('Msj.messages')

                <!-- form start -->
                <div class="form-horizontal">
                  {!!Form::open(['route'=>'proveedor.store','method'=>'POST'])!!}           
                
                    <div class="box-body">
                      <div class="form-group">
                          <label for="id" class="col-sm-2 control-label">Numero</label>
                          <div class="col-sm-6">
                            <input type="number" min="0" class="form-control" id="id" name="id" placeholder="Ingrese Numero de Proveedor" autofocus="on" >
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="name" class="col-sm-2 control-label">Nombre</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Digite nombre del nuevo proveedor" >
                          </div>
                      </div>   
                      <div class="form-group">
                          <label for="direction" class="col-sm-2 control-label">Direccion</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="direction" name="direction" placeholder="Digite La Direccion del nuevo proveedor">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="phone" class="col-sm-2 control-label">Telefono</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="ejemplo 9999-9999" >
                          </div>
                      </div>   
                       <div class="form-group">
                          <label for="fax" class="col-sm-2 control-label">Fax</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="fax" name="fax" placeholder="Digite fax del nuevo proveedor">
                          </div>
                      </div> 
                      <div class="form-group">
                          <label for="seller" class="col-sm-2 control-label">Vendedor</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="seller" name="seller" placeholder="Ingrese vendedor del nuevo proveedor">
                          </div>
                      </div>            
                    </div><!-- /.box-body -->                    
                        <div class="box-footer col-sm-offset-2">
                          	<a href="{{Route('proveedor.index')}}"><button type="button" id="cancelar" class="btn btn-default m-t-10">Cancelar</button></a>
                            {!!Form::submit('Aceptar',['name'=>'aceptar','id'=>'aceptar','content'=>'<span>Acpetar</span>','class'=>'btn btn-info'])!!}
                           
                        </div>   
                  {!!Form::close()!!}              
                </div>
              </div><!-- /.box -->
            


<script type="text/javascript">

window.onload = function() {
   $('#phone').mask('9999-9999'); 
};

</script>

 @endsection






    
  
  