<link rel="stylesheet" href=" {{ asset('bootstrap/css/bootstrap.css') }}">
<link rel="stylesheet" href=" {{ asset('bootstrap/css/style.css') }}">


<div style="">
  <div style="width: 20%;  display: inline-block;">
    <img 
        src="{{asset('dist/img/minerva.png')}}"          
        alt="logo ues"
        style="width: 5em; height:6em;"        
    >
  </div>
  <div style="width: 57%;  display: inline-block; text-align: center;">
    <h4>UNIVERSIDAD DE EL SALVADOR</h4>
    <h3>FACULTAD DE MEDICINA</h3>
    <h4>BODEGA DE SUMINISTROS</h4>
  </div>
  <div style="width: 20%; display: inline-block;">
     <img 
        src="{{asset('dist/img/simbolo.png')}}"         
        alt="logo ues"
        style="width: 100px; height:90px; " 
      >
  </div>
</div>
<div style="width: 100%; display: block;">
    <hr>
    <hr>
    REQUISICION No : <h3>{{$requisicion->id}}/</h3>    
    FECHA : <h3>{{$fecha}}</h3>
    DEPARTAMENTO SOLICITANTE : <h3>{{$requisicion->departamento['name']}}</h3>
</div>
<div style="width: 100%; display: block;">
    <table class="table table-hover table-striped table-bordered table-condensed" id="TablaDetalleRequesicion">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Nombre del Articulo</th>        
            <th>Unidad de Medida</th>
            <th>Cant Solicitada</th> 
            <th>Cant Aprobada</th>
            <th>Precio</th>             
        </tr>
     </thead>
    <tbody>
     
    @foreach ($detalle as $d) 

        <tr>  
            <td>{{$d->articulo['codigo_articulo']}}</td>
            <td>{{$d->articulo['nombre_articulo']}}</td>
            <td>{{$d->articulo['unidad']['nombre_unidadmedida']}}</td>
            <td>{{$d->cantidad_solicitada}}</td>     
            <td>{{$d->cantidad_entregada}}</td>
           <td>{{number_format($d->articulo['precio_unitario'],2,'.','')}}</td>
                   
       
        </tr>
      
    @endforeach
    </tbody>  
    </table>
</div>
     

 


</script>
