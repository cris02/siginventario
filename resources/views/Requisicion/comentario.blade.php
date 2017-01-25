@extends('layouts.template')

@section('content')
<h3>Agregar Descripcion a la requisicion</h3>

<a href="javascript:window.history.back();" class="btn btn-primary">Cancelar</a>

<div class="form-horizontal">
    {!!Form::open(['route'=>'requisicion.detalle.store','method'=>'POST'])!!}           
  
      <div class="box-body">             
       <textarea name="comentario" rows="6" cols="100" placeholder="escribe aqui tus comentarios"></textarea>
       <input type="hidden" name="id" value="{{$id}}">
                  
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