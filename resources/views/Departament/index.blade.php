@extends('layouts.template')

@section('content')

@include('Msj.messages')

<div class="box-header with-border container">
              <h3 class="box-title">DEPARTAMENTO/UNIDAD</h3>
</div><!-- /.box-header -->

<table class="table table-bordered table-hover ">
<tbody>
 <tr>
  
    <td class="danger col-xs-1">Codigo</td>
    <td class="danger col-xs-2">Depto/Unidad</td>
    <td class="danger col-xs-3">Jefe de Départamento</td>
    <td class="danger col-xs-1">Telefono</td>
    
    <td class="danger col-xs-1"></td>
    <td class="danger col-xs-1"></td>


  </tr>
@foreach ($departamentos as $d)
  <tr>
    <div class="row">
        <td class=" col-xs-1">{{$d->code}}</td>
        <td class=" col-xs-2">{{$d->depto/Unidad}}</td>
        <td class=" col-xs-3">{{$p->Jdepto}}</td>
        <td class=" col-xs-1">{{$p->telefono}}</td>
        
        <td><a href="{{route('departamento.edit',$p->code)}}"><button type="button" class="btn btn-primary">Editar</button></a></td>    
        <td><a href="{{route('departamento.show',$p->code)}}"><button type="button" class="btn btn-danger">Eliminar</button></a></td>
    </td>
  </tr>
 @endforeach

</tbody>
  
</table>
    <div class="text-center">
        {!!$departamentos->links()!!}
    </div>

<div class="container"> 
    <a href="{{url('departamento/create')}}"> <img src="{{asset('dist/img/agregar.png')}}" alt="Agregar Nuevo"></a>    
</div>


@endsection