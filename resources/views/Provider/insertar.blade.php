@extends('layouts.template')

@section('content')

<!-- Horizontal Form -->
              <div class="panel-body">
                <div class="box-header with-border container">
                  <h3 class="box-title">INGRESAR NUEVO PROVEEDOR</h3>
                </div><!-- /.box-header -->
              
               

                <!-- form start -->
                <div class="form-horizontal">
                  {!!Form::open(['route'=>'proveedor.store','method'=>'POST'])!!}           
                
                    <div class="box-body">

                      <div class="form-group">
                                {!!Form::label('nombre', 'Nombre', array('class' =>'col-md-2 control-label' )) !!}
                        <div class="col-md-6">
                                    {!!Form::text('nombre', '', array('placeholder' => 'Digite nombre del nuevo proveedor','class' => 'form-control','required','autofocus'=>'on')) !!}
                            <div class="error">
                              <ul>@foreach($errors->get('nombre') as $msg)<li>{{$msg}}</li> @endforeach</ul>
                            </div>
                        </div>
                      </div>
                    
                      
                      <div class="form-group">
                          <label for="direccion" class="col-sm-2 control-label">Direccion</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion') }}" placeholder="Digite La Direccion del nuevo proveedor" required>
                                 <div class="error">
                                    <ul>@foreach($errors->get('direccion') as $msg)<li>{{$msg}}</li> @endforeach</ul>
                                </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="telefono" class="col-sm-2 control-label">Telefono</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}" placeholder="ejemplo 9999-9999" required>
                                <div class="error">
                                    <ul>@foreach($errors->get('telefono') as $msg)<li>{{$msg}}</li> @endforeach</ul>
                                </div>
                          </div>
                      </div>   
                      <div class="form-group">
                          <label for="fax" class="col-sm-2 control-label">Fax</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="fax" name="fax" value="{{ old('fax') }}" placeholder="Digite fax del nuevo proveedor">
                          </div>
                      </div> 
                      <div class="form-group">
                          <label for="email" class="col-sm-2 control-label">Correo</label>
                          <div class="col-sm-6">
                            <input type="email"  class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Ingrese email">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="vendedor" class="col-sm-2 control-label">Vendedor</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="vendedor" name="vendedor" value="{{ old('vendedor') }}" placeholder="Ingrese vendedor del nuevo proveedor" required>
                                  <div class="error">
                                        <ul>@foreach($errors->get('vendedor') as $msg)<li>{{$msg}}</li> @endforeach</ul>
                                  </div>
                          </div>
                      </div>            
                    </div><!-- /.box-body -->                    
                        <div class="col-sm-offset-2">
                          	<a href="{{Route('proveedor.index')}}"><button type="button" id="cancelar" class="btn btn-default m-t-10">Cancelar</button></a>
                            {!!Form::submit('Aceptar',['name'=>'aceptar','id'=>'aceptar','content'=>'<span>Acpetar</span>','class'=>'btn btn-info'])!!}
                           
                        </div>   
                  {!!Form::close()!!}              
                </div>
              </div><!-- /.box -->
            


<script type="text/javascript">

window.onload = function() {
   $('#telefono').mask('9999-9999'); 
   $('#fax').mask('9999-9999'); 
};

</script>

 @endsection






    
  
  