@extends('layouts.template')

@section('content')  
         
        <a href="{{route('proveedor.create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Nuevo</a>
     
<div class="table-responsive">
                   
             @include('Msj.messages')
             
      


            <table class="table table-hover table-striped table-bordered table-condensed"v>       
                <thead>
                  <tr class="success">
                      
                        <th >NUMERO</th>
                        <th >NOMBRE</th>                    
                        <th >TELEFONO</th>                  
                        <th ></th>                     

                  </tr>
                </thead>
                <tbody>
                   @foreach ($proveedores as $p)
                      <tr>
                          <div class="row">
                              <td class="col-xs-1">{{$p->id}}</td>
                              <td class="col-xs-5">{{$p->name}}</td>               
                              <td class="col-xs-2">{{$p->phone}}</td>  
                              <td ><a class="btn btn-default btn-sm" href="{{url('proveedor/detail',$p->id)}}"><span class="glyphicon glyphicon-th-large col-xs-1"></span>Detalle</a>

                              <a class="btn btn-default btn-sm" href="{{route('proveedor.edit',$p->id)}}"><span class="glyphicon glyphicon-pencil col-xs-1"></span>Editar</a>   

                              <a class="btn btn-default btn-sm" href="{{route('proveedor.show',$p->id)}}"><span class="glyphicon glyphicon-trash col-xs-1"></span>Eliminar</a>
                              </td>
                          </div>
                      </tr>
                   @endforeach      
                                      
                </tbody>
            </table>

             <div class="text-center">
                 {!!$proveedores->links()!!}
            </div>
           
</div>

@endsection
