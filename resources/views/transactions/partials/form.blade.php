

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
  <div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="text">Usuario</label>
    {!! Form::text('name',null, ['class' => 'form-control','placeholder' => 'Ingresa Usuario']) !!}
  </div>
  </div>
  
  <div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="text">Tipo Transaccion</label>
    {!! Form::text('type', null, ['class' => 'form-control','placeholder' => 'Ingresa Tipo Transaccion']) !!}
  </div>
  </div>
</div>

</div>
<div class="row">
<div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="text">Fecha Transaccion</label>
    {!! Form::text('date', null, ['class' => 'form-control','placeholder' => 'Ingresa Fecha']) !!}
  </div>
  </div>
<div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="text">Total</label>
    {!! Form::text('total', null, ['class' => 'form-control','placeholder' => 'Ingresa Total']) !!}
  </div>
  </div>

<div class="form-group">
<div class="text-center">
<button type="submit" class="btn btn-primary">{{ $Modo=='crear'? 'Agregar': 'Modificar'}}</button>
</div>
</div>
</div>
