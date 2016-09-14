@extends('layouts.template')

@section('content')

              <div class="box box-info container">
                <div class="box-header with-border">
                  <h3 class="box-title">Modificar Datos de Proveedor</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{url('proveedor/update')}}")>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="id" class="col-sm-2 control-label">Numero</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" id="id" name="id" value="{{$provider->id}}" >
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 control-label">Nombre</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="{{$provider->name}}">
                      </div>
                    </div>   
                    <div class="form-group">
                      <label for="direction" class="col-sm-2 control-label">Direccion</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="direction" name="direction" value="{{$provider->direction}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="phone" class="col-sm-2 control-label">Telefono</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="phone" name="phone" value="{{$provider->phone}}">
                      </div>
                    </div>   
                     <div class="form-group">
                      <label for="fax" class="col-sm-2 control-label">Fax</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="fax" name="fax" value="{{$provider->fax}}">
                      </div>
                    </div> 
                    <div class="form-group">
                      <label for="seller" class="col-sm-2 control-label">Vendedor</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="seller" name="seller" value="{{$provider->seller}}">
                      </div>
                    </div>            
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                        <button type="submit" class="btn btn-info">Actualizar</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->


 @endsection
