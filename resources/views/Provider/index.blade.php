@extends('layouts.template')

@section('content')

<div class="container" style="margin-left: 25%">
	<hr>
		 <td><a href="{{url('proveedor/create')}}"><button type="button" class="btn btn-success col-md-6">Ingresar Nuevo Proveedor</button></a></td>
	
</div>
<hr>
<table class="table table-hover" style="border: solid 2px black">
<tbody>
 <tr>
  
    <td class="danger col-md-2">numero</td>
    <td class="danger col-md-2">nombre</td>
    <td class="danger col-md-2">direccion</td>
    <td class="danger col-md-2">telefono</td>
    <td class="danger col-md-2">vendedor</td>


  </tr>
@foreach ($proveedores as $p)
  <tr>
  
    <td class="info col-md-1">{{$p->id}}</td>
    <td class="info col-md-3">{{$p->name}}</td>
    <td class="info col-md-3">{{$p->direction}}</td>
    <td class="info col-md-2">{{$p->phone}}</td>
    <td class="info col-md-3">{{$p->seller}}</td>
    <td><a href="{{route('proveedor.edit',$p->id)}}"><button type="button" class="btn btn-primary">Editar</button></a></td>    
    <td><button type="button" class="btn btn-danger">Eliminar</button></td>

  </tr>
 @endforeach

</tbody>
  
</table>




@endsection