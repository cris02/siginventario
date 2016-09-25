@extends('layouts.template')

@section('content')

@include('Msj.messages')

<div class="box-header with-border container">
              <h3 class="box-title">DEPARTAMENTO/UNIDAD</h3>
               <br>
                    <a href="{{route('departamento.create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Nuevo</a>
                <br/>
</div><!-- /.box-header -->

<table class="table table-bordered table-hover ">
<tbody>
 <tr class="danger">
  
    <th class="col-xs-1">Codigo</th>
    <th class="col-xs-2">Depto/Unidad</th>
    <th class="col-xs-1"></th>
    <th class="col-xs-1"></th>


  </tr>
@foreach ($departamentos as $d)
  <tr>
    <div class="row">
        <td class=" col-xs-1">{{$d->code}}</td>
        <td class=" col-xs-2">{{$d->name}}</td>      
        <td><a class="btn btn-default" href="{{route('departamento.edit',$d->code)}}"><span class="glyphicon glyphicon-pencil col-xs-1"></span>Editar</a></td>    
        <td><a class="btn btn-default" href="{{route('departamento.show',$d->code)}}"><span class="glyphicon glyphicon-trash col-xs-1"></span>Eliminar</a></td>
                </div>
       
    </td>
  </tr>
 @endforeach

</tbody>
  
</table>

<div class="text-center">
             {!!$departamentos->links()!!}
        </div>
        <div class=" container">
            
        </div>
  
@endsection

