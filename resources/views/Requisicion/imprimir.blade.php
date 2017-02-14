<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Requisicion</title>  
  
  {!! Html::style('bootstrap/css/bootstrap.css') !!}
  
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-xs-2">
        <img 
            src="{{asset('dist/img/minerva.png')}}"          
            alt="logo ues"
            style="width: 5em; height:6em;"        
        >
      </div>
      <div class="col-xs-7" style="text-align: center;">
        <div class="row">
          <div class="col-xs-12">
            <p>UNIVERSIDAD DE EL SALVADOR</p>
          </div>         
          <div class="col-xs-12">
            <h3>FACULTAD DE MEDICINA</h3>
          </div>
              <br><br>    
          <div class="col-xs-12">
            <p>BODEGA DE SUMINISTROS</p>
          </div>
        </div>             
      </div>
      <div class="col-xs-3">
         <img 
            src="{{asset('dist/img/simbolo.png')}}"         
            alt="logo ues"
            style="width: 100px; height:90px; " 
          >
      </div>
    </div>   
      <br><br><br><br><br>
        <hr>
        <hr>
    <div class="row">
      <div class="col-xs-6">
        <p> REQUISICION No :<b>{{$requisicion->id}}/{{$fecha['año']}}</b></p> 
      </div>
      <div class="col-xs-6">   
        <p>FECHA :<b> {{$fecha['fecha']}}</b></p>
      </div>
     </div>
        <br><br>
    <div class="row">
      <div class="col-xs-12">
        <p>DEPARTAMENTO SOLICITANTE : <b>{{$requisicion->departamento['name']}}</b></p>
      </div>
        <br>
      <div class="col-md-12" style="text-align: center;">
        <font size=1><i>Sin las firmas y sellos del Jefe del Departamento/Unidad o equivalente y del Administrador Financiero, ésta requisicion no es válida</i></font>
      </div>        
    </div>
       <br>
    <div class="row">
      <div class="col-xs-12">
        <p>JEFE DEL DEPARTAMENTO SOLICITANTE</p>
      </div>
       <br>
    </div>
    <div class="row">
      <div class="col-xs-6">
        <p>NOMBRE: <u>{{$requisicion->departamento['encargado']}}</u></p>
      </div>
      <div class="col-xs-6" style="padding-left: 350px;">
        <p>FIRMA: _____________________ SELLO:</p>
      </div>
     
    </div>
       <br><br><br>   
    <div >
      <table class="table table-bordered ">
      <thead>
          <tr class="row">
              <th class="col-xs-1">CODIGO</th>
              <th class="col-xs-5">NOMBRE DEL ARTICULO</th>        
              <th class="col-xs-2">UNIDAD DE MEDIDA</th>
              <th class="col-xs-2">CANTIDAD ENTREGADA</th>             
              <th class="col-xs-2">VALOR UNITARIO</th>             
          </tr>
       </thead>
      <tbody>
       
      @foreach ($detalle as $d) 

          <tr>  
              <td>{{$d->articulo['codigo_articulo']}}</td>
              <td>{{$d->articulo['nombre_articulo']}}</td>
              <td>{{$d->articulo['unidad']['nombre_unidadmedida']}}</td>              
              <td>{{$d->cantidad_entregada}}</td>
             <td>{{number_format($d->articulo['precio_unitario'],2,'.','')}}</td> 
          </tr>
        
      @endforeach
      </tbody>  
      </table>
    </div>

    <p>ADMINISTRADOR DE BODEGA: {{$usuarios['bodega']}}</p>
    <p>ADMINISTRADOR FINANCIERO: {{$usuarios['financiero']}}</p>
    <P>JEFE DE DEPARTAMENTO: {{$requisicion->departamento['encargado']}}</P>
  </div>
  
    
</body>
</html>




     

 



