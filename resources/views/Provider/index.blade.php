@extends('layouts.template')

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<link rel="stylesheet" href="http://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">

<div class="box-header with-border container">
              <h3 class="box-title">PROVEEDORES</h3>

                <br>
                    <a href="{{route('proveedor.create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Nuevo</a>
                <br/>
</div><!-- /.box-header -->
               
         @include('Msj.messages')
         
  

<div class="container">
        <table class="table table-bordered table-hover" id='tabla'>       
            <tr class="danger">
                 <div class="row">
                  
                    <th>NUMERO</th>
                    <th>NOMBRE</th>                    
                    <th>TELEFONO</th>                  
                    <th></th>
                    <th></th>


                  </div>
            </tr>
         @foreach ($proveedores as $p)
            <tr>
                <div class="row">
                    <td>{{$p->id}}</td>
                    <td>{{$p->name}}</td>               
                    <td>{{$p->phone}}</td>              
                    <td><a class="btn btn-default" href="{{route('proveedor.edit',$p->id)}}"><span class="glyphicon glyphicon-pencil col-xs-1"></span>Editar</a></td>    
                    <td><a class="btn btn-default" href="{{route('proveedor.show',$p->id)}}"><span class="glyphicon glyphicon-trash col-xs-1"></span>Eliminar</a></td>
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
  
<script type="text/javascript" src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){

     $('#tabla').DataTable();
});
</script>

@endsection
