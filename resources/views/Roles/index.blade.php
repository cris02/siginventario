@extends('layouts.template')

@section('content')
    <div class="encabezado">
	    <h3>Roles</h3>
	</div>
         
        <a href="{{route('roles.create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Nuevo</a>
     
<div class="panel-body table-responsive">
                   
             @include('Msj.messages')                 
            
            <table class="table table-hover table-striped table-bordered table-condensed" id="TablaProveedores">       
                <thead>                    
                        <th >NOMBRE</th>
                        <th >DESCRIPCION</th>              
                </thead>
                <tbody>
                   @foreach ($roles as $r)
                      <tr>
                              <td>{{$r->name}}</td>
                              <td>{{$r->description}}</td>                                
                              <td >
                                <a class="btn btn-default btn-sm" title="editar" href="{{route('roles.edit',$r->id)}}"><span class="glyphicon glyphicon-pencil "></span></a>   

                                <a class="btn btn-default btn-sm" title="eliminar" href="{{route('roles.show',$r->id)}}" ><span class="glyphicon glyphicon-trash "></span></a>
                              </td>
                         
                      </tr>
                   @endforeach      
                                      
                </tbody>
            </table>

</div>
 @endsection
 @section('script')
<script type="text/javascript">
 
 
</script>

@endsection