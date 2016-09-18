@extends('layouts.template')

@section('content')

@include('Msj.messages')

<div class="box-header with-border container">
              <h3 class="box-title">PROVEEDORES</h3>
</div><!-- /.box-header -->

<table class="table table-bordered table-hover">
<tbody>
 <tr>
  
    <td class="danger col-xs-1">NUMERO</td>
    <td class="danger col-xs-2">NOMBRE</td>
    <td class="danger col-xs-3">DIRECCION</td>
    <td class="danger col-xs-1">TELEFONO</td>
    <td class="danger col-xs-3">VENDEDOR</td>
    <td class="danger col-xs-1"></td>
    <td class="danger col-xs-1"></td>


  </tr>
@foreach ($proveedores as $p)
  <tr>
    <div class="row">
        <td class=" col-xs-1">{{$p->id}}</td>
        <td class=" col-xs-2">{{$p->name}}</td>
        <td class=" col-xs-3">{{$p->direction}}</td>
        <td class=" col-xs-1">{{$p->phone}}</td>
        <td class=" col-xs-3">{{$p->seller}}</td>
        <td><a href="{{route('proveedor.edit',$p->id)}}"><button type="button" class="btn btn-primary">Editar</button></a></td>    
        <td><a href="{{route('proveedor.show',$p->id)}}"><button type="button" class="btn btn-danger">Eliminar</button></a></td>
    </td>
  </tr>
 @endforeach

</tbody>
  
</table>
    <div class="text-center">
        {!!$proveedores->links()!!}
    </div>

<div class="container"> 
    <a href="{{url('proveedor/create')}}"> <img src="{{asset('dist/img/agregar.png')}}" alt="Agregar Nuevo"></a>    
</div>


@endsection