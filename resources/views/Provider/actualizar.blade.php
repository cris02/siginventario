@extends('layouts.template')

@section('content')

              <div class="panel panel-default">
                <div class="box-header with-border">
                  <h3 class="box-title">MODIFICAR DATOS DEL PROVEEDOR</h3>
                </div><!-- /.box-header -->
            
                       
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
	                      <label for="nombre" class="col-sm-2 control-label">Nombre</label>
	                      <div class="col-sm-6">
	                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$provider->nombre}}" >
	                            <div class="error">
                                    <ul>@foreach($errors->get('nombre') as $msg)<li>{{$msg}}</li> @endforeach</ul>
                                </div>
	                      </div>
	                    </div>   
	                    <div class="form-group">
	                      <label for="direccion" class="col-sm-2 control-label">Direccion</label>
	                      <div class="col-sm-6">
	                        <input type="text" class="form-control" id="direccion" name="direccion" value="{{$provider->direccion}}">
	                            <div class="error">
                                    <ul>@foreach($errors->get('direccion') as $msg)<li>{{$msg}}</li> @endforeach</ul>
                                </div>
	                      </div>
	                    </div>
	                    <div class="form-group">
	                      <label for="telefono" class="col-sm-2 control-label">Telefono</label>
	                      <div class="col-sm-6">
	                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{$provider->telefono}}">
	                        	<div class="error">
                                    <ul>@foreach($errors->get('telefono') as $msg)<li>{{$msg}}</li> @endforeach</ul>
                                </div>
	                      </div>
	                    </div>   
	                     <div class="form-group">
	                      <label for="fax" class="col-sm-2 control-label">Fax</label>
	                      <div class="col-sm-6">
	                        <input type="text" class="form-control" id="fax" name="fax" value="{{$provider->fax}}">
	                            <div class="error">
                                    <ul>@foreach($errors->get('fax') as $msg)<li>{{$msg}}</li> @endforeach</ul>
                                </div>
	                      </div>
	                    </div> 
	                    <div class="form-group">
	                      <label for="fax" class="col-sm-2 control-label">Correo</label>
	                      <div class="col-sm-6">
	                        <input type="email" class="form-control" id="email" name="fax" value="{{$provider->email}}" required>
	                            <div class="error">
                                    <ul>@foreach($errors->get('email') as $msg)<li>{{$msg}}</li> @endforeach</ul>
                                </div>
	                      </div>
	                    </div> 
	                    <div class="form-group">
	                      <label for="vendedor" class="col-sm-2 control-label">Vendedor</label>
	                      <div class="col-sm-6">
	                        <input type="text" class="form-control" id="vendedor" name="vendedor" value="{{$provider->vendedor}}">
	                            <div class="error">
                                    <ul>@foreach($errors->get('vendedor') as $msg)<li>{{$msg}}</li> @endforeach</ul>
                                </div>
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


 @endsection
@section('script')
<script type="text/javascript">

window.onload = function() {
   $('#telefono').mask('9999-9999'); 
    $('#fax').mask('9999-9999'); 
};
</script>

@endsection