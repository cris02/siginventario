@extends('layouts.template')

@section('content')

<!-- Horizontal Form -->
              <div class="box box-info container">
                <div class="box-header with-border">
                  <h3 class="box-title">Ingrese Datos del Nuevo Proveedor</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{url('proveedor/store')}}")>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="id" class="col-sm-2 control-label">Numero</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" id="id" name="id" placeholder="Ingrese Numero de Proveedor">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 control-label">Nombre</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Digite nombre del nuevo proveedor">
                      </div>
                    </div>   
                    <div class="form-group">
                      <label for="direction" class="col-sm-2 control-label">Direccion</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="direction" name="direction" placeholder="Digite La Direccion del nuevo proveedor">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="phone" class="col-sm-2 control-label">Telefono</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Ejemplo 7000-9999">
                      </div>
                    </div>   
                     <div class="form-group">
                      <label for="fax" class="col-sm-2 control-label">Fax</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="fax" name="fax" placeholder="Digite fax del nuevo proveedor">
                      </div>
                    </div> 
                    <div class="form-group">
                      <label for="seller" class="col-sm-2 control-label">Vendedor</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="seller" name="seller" placeholder="Ingrese vendedor del nuevo proveedor">
                      </div>
                    </div>            
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                  	<a href="{{url('proveedor/index')}}"><button class="btn btn-default">Cancelar</button></a>
                    <button type="submit" class="btn btn-info pull-right">Aceptar</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->

 @endsection
