@extends('layouts.template')

@section('content')
<h3>Observaciones de la requisicion</h3>

<a href="javascript:window.history.back();" class="btn btn-primary">Regresar</a>

<div class="form-horizontal">
    {!!Form::open(['route'=>'requisicion.detalle.store','method'=>'POST'])!!}           
  
      <div class="box-body"> 
      <h3>observacion por parte del solicitante</h3>            
       <textarea name="comentario" rows="4" cols="100" readonly="">{{$requisicion->descripcion}}</textarea>
       <h3>observacion por parte del administrador de bodega</h3>
       <textarea name="descripcion" rows="4" cols="100">{{$requisicion->comentario}}</textarea>
       <input type="hidden" name="id" value="{{$requisicion->id}}">
                  
      </div><!-- /.box-body -->                    
          <div class="col-sm-offset-2">
             
              {!!Form::submit('Aceptar',['name'=>'aceptar','id'=>'aceptar','content'=>'<span>Acpetar</span>','class'=>'btn btn-info'])!!}
             
          </div>   
    {!!Form::close()!!}              
  </div>

     
@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection