@extends('layouts.template')

@section('content')
         
        <a href="{{route('proveedor.create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Nuevo</a>
     
<div class="panel-body table-responsive">
                   
             @include('Msj.messages')         



            <table class="table table-hover table-striped table-bordered table-condensed" id="TablaProveedores">       
                <thead>
               
                      
                        <th >NUMERO</th>
                        <th >NOMBRE</th>                    
                        <th >TELEFONO</th>                  
                        <th ></th>                     

                 
                </thead>
                <tbody>
                   @foreach ($proveedores as $p)
                      <tr>
                              <td>{{$p->id}}</td>
                              <td>{{$p->nombre}}</td>               
                              <td>{{$p->telefono}}</td>  
                              <td ><a class="btn btn-default btn-sm" href="{{url('proveedor/detail',$p->id)}}"><span class="glyphicon glyphicon-th-large "></span>Detalle</a>

                              <a class="btn btn-default btn-sm" href="{{route('proveedor.edit',$p->id)}}"><span class="glyphicon glyphicon-pencil "></span>Editar</a>   

                              <a class="btn btn-default btn-sm" href="{{route('proveedor.show',$p->id)}}"><span class="glyphicon glyphicon-trash "></span>Eliminar</a>
                              </td>
                         
                      </tr>
                   @endforeach      
                                      
                </tbody>
            </table>

</div>

<script type="text/javascript">
  $(document).ready(function(){
  
    $('#TablaProveedores').DataTable();
});  
</script>

 @endsection
