@extends('layouts.template')

@section('content')

<div class="col-md-10">
    <div class="box-header with-border container">
                  <h3 class="box-title">PROVEEDORES</h3>

                    <br>
                        <a href="{{route('proveedor.create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Nuevo</a>
                    <br/>
    </div><!-- /.box-header -->

    <div class="table-responsive">
                   
             @include('Msj.messages')
             
      


            <table class="table table-hover table-striped table-bordered table-condensed'>       
                <tr class="danger">
                     <div class="row">
                      
                        <th class="col-xs-1">NUMERO</th>
                        <th class="col-xs-3">NOMBRE</th>                    
                        <th class="col-xs-1">TELEFONO</th>                  
                        <th ></th>
                      


                      </div>
                </tr>
             @foreach ($proveedores as $p)
                <tr>
                    <div class="row">
                        <td class="col-xs-1">{{$p->id}}</td>
                        <td class="col-xs-3">{{$p->name}}</td>               
                        <td class="col-xs-1">{{$p->phone}}</td>  
                        <td ><a class="btn btn-default" href="{{url('proveedor/detail',$p->id)}}"><span class="glyphicon glyphicon-th-large col-xs-1"></span>Detalle</a>

                        <a class="btn btn-default" href="{{route('proveedor.edit',$p->id)}}"><span class="glyphicon glyphicon-pencil col-xs-1"></span>Editar</a>   

                        <a class="btn btn-default" href="{{route('proveedor.show',$p->id)}}"><span class="glyphicon glyphicon-trash col-xs-1"></span>Eliminar</a>
                        </td>
                    </div>
                </tr>
             @endforeach        
              
            </table>

             <div class="text-center">
                 {!!$proveedores->links()!!}
            </div>
            <div class=" container">
                
            </div>
    </div>

</div>


@endsection
