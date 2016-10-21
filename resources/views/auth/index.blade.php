@extends('layouts.template')

@section('content')
         
        <a href="{{url('register')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Nuevo</a>
     
<div class="panel-body table-responsive">
                   
             @include('Msj.messages')         



            <table class="table table-hover table-striped table-bordered table-condensed" id="TablaUsuarios">       
                <thead>
               
                      
                        <th >NUMERO</th>
                        <th >NOMBRE</th>                    
                                           

                 
                </thead>
                <tbody>
                   @foreach ($usuarios as $u)
                      <tr>
                              <td>{{$u->id}}</td>
                              <td>{{$u->name}}</td>           
                              <td>                       
                              <a class="btn btn-default btn-sm" title="editar" href="{{url($u->id,'edit')}}"><span class="glyphicon glyphicon-pencil "></span></a>   

                              <a class="btn btn-default btn-sm" title="eliminar" href="{{route('proveedor.show',$u->id)}}"><span class="glyphicon glyphicon-trash "></span></a>
                              </td>
                         
                      </tr>
                   @endforeach      
                                      
                </tbody>
            </table>

</div>

<script >
  $(document).ready(function(){
  
    $('#TablaUsuarios').DataTable();
});  
</script>

 @endsection
