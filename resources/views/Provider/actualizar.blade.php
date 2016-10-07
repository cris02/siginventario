@extends('layouts.template')

@section('content')

              <div class="box box-info container">
                <div class="box-header with-border">
                  <h3 class="box-title">MODIFICAR DATOS DEL PROVEEDOR</h3>
                </div><!-- /.box-header -->
            
                        @include('Msj.messages')

                <div class="form-horizontal">
	               {!!Form::model($provider,['route'=>['proveedor.update',$provider->id],'method'=>'patch'])!!}
	                <input type="hidden" name="_token" value="{{ csrf_token() }}">
	                  <div class="box-body">

	                   <div class="form-group">
	                      <label for="name" class="col-sm-2 control-label">Numero</label>
	                      <div class="col-sm-6">
	                        <input type="text" class="form-control" id="id" name="id" value="{{$provider->id}}" readonly>
	                      </div>
	                    </div> 	                    
	                    <div class="form-group">
	                      <label for="name" class="col-sm-2 control-label">Nombre</label>
	                      <div class="col-sm-6">
	                        <input type="text" class="form-control" id="name" name="name" value="{{$provider->name}}" >
	                      </div>
	                    </div>   
	                    <div class="form-group">
	                      <label for="direction" class="col-sm-2 control-label">Direccion</label>
	                      <div class="col-sm-6">
	                        <input type="text" class="form-control" id="direction" name="direction" value="{{$provider->direction}}">
	                      </div>
	                    </div>
	                    <div class="form-group">
	                      <label for="phone" class="col-sm-2 control-label">Telefono</label>
	                      <div class="col-sm-6">
	                        <input type="text" class="form-control" id="phone" name="phone" value="{{$provider->phone}}">
	                      </div>
	                    </div>   
	                     <div class="form-group">
	                      <label for="fax" class="col-sm-2 control-label">Fax</label>
	                      <div class="col-sm-6">
	                        <input type="text" class="form-control" id="fax" name="fax" value="{{$provider->fax}}">
	                      </div>
	                    </div> 
	                    <div class="form-group">
	                      <label for="seller" class="col-sm-2 control-label">Vendedor</label>
	                      <div class="col-sm-6">
	                        <input type="text" class="form-control" id="seller" name="seller" value="{{$provider->seller}}">
	                      </div>
	                    </div>            
	                  </div><!-- /.box-body -->
	                  <div class="box-footer">
	                  			<a href="{{Route('proveedor.index')}}"><button type="button" id="cancelar" class="btn btn-default m-t-10">Cancelar</button></a>
	                        <button type="submit" class="btn btn-info">Actualizar</button>
	                  </div><!-- /.box-footer -->
	               {!!Form::close()!!}
               </div>
              </div><!-- /.box -->



<script type="text/javascript">

window.onload = function() {
   $('#phone').mask('9999-9999'); 
    $('#fax').mask('9999-9999'); 
};

</script>


 @endsection
