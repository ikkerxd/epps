



<div class="box-body">

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Sorry!</strong> Tienes problemas con tu input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    @csrf



<div class="row">
  
  
  <div class="col-xs-12 col-sm-12">
  <br>
  <br>

  <div class="form-group ">
  
    <h4 class="box-title">Nombre categoria<h4>
    {!! Form::text('name',null, ['class' => 'form-control text-center', 'style'=>"width : 390px; heigth : 50px ;position:absolute; top:80px; left:380px",'placeholder' => 'Ingresa Categoria']) !!}
  </div>
  </div>

</div>
<div class="form-group">
<div class="text-center">
<button type="submit" class="btn btn-primary" style="position:absolute;top:190px;left:540px">Guardar</button>
</div>
</div>
</div>
