  <li class="treeview">
    <a href="#">
      <i class="glyphicon glyphicon-list-alt"></i> <span>Articulos</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>  
       <ul class="treeview-menu">
        <li><a href="{{url('articulo')}}"><i class="glyphicon glyphicon-chevron-right"></i>Productos</a></li>
        <li><a href="{{url('unidad')}}"><i class="glyphicon glyphicon-chevron-right"></i>Unidad de Medida</a></li>
        <li><a href="{{url('especifico')}}"><i class="glyphicon glyphicon-chevron-right"></i>Especificos</a></li>  
                    
      </ul>          
  </li> 
    <li class="treeview">
    <a href="#">
      <i class="glyphicon glyphicon-floppy-open"></i> <span>Almacenamiento</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>  
       <ul class="treeview-menu">
        <li><a href="{{url('existencia')}}"><i class="glyphicon glyphicon-chevron-right"></i>Existencia</a></li>
        <li><a href="{{ route('ingreso.create')}}"><i class="glyphicon glyphicon-chevron-right"></i>Agregar Existencia</a></li>
        
                      
      </ul>          
  </li>


  <li class="treeview">
    <a href="{{url('departamento')}}">
      <i class="glyphicon glyphicon-object-align-vertical"></i> <span>Departamentos</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>             
  </li> 

  <li class="treeview">
    <a href="{{url('proveedor')}}">
      <i class="glyphicon glyphicon-shopping-cart"></i> <span>Proveedores</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>             
  </li>
  
  <li class="treeview">
    <a href="#">
      <i class="glyphicon glyphicon-tags"></i> <span>Requisiciones</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>  
       <ul class="treeview-menu">
          <li><a href="{{url('requisicion/listar')}}"><i class="glyphicon glyphicon-chevron-right"></i>Requisiciones</a></li>
          <li><a href="{{route('habilitar-envios')}}"><i class="glyphicon glyphicon-chevron-right"></i>HabilitarEnvios</a></li>    
      </ul>          
  </li>
 