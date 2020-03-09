

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


</div>
<div class="row">
<div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="text">Fecha Transaccion</label>
    {!! Form::text('date', null, ['class' => 'form-control datepicker','placeholder' => 'Ingresa Fecha']) !!}
  </div>
  </div>
<div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="text">Total</label>
    {!! Form::number('total', null, ['class' => 'form-control','placeholder' => 'Ingresa Total']) !!}
  </div>
  </div>
</div>

<div class="row">
<div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="text">Nro Transaccion</label>
    {!! Form::number('nro_transaction', null, ['class' => 'form-control','placeholder' => 'Ingresa nro de Transaccion']) !!}
  </div>
  </div>
<div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="text">Nro Guia</label>
    {!! Form::number('nro_guide', null, ['class' => 'form-control','placeholder' => 'Ingresa el numero de Guia']) !!}
  </div>
  </div>
</div>

<div class="row">
<div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="text">Usuario</label>
    {!! Form::select('users.id',$user,null, ['class' => 'form-control','style' => 'width: 100%']) !!}
  </div>
  
</div>

<div class="form-group">
<div class="text-center">
<button type="submit" style="position:absolute;top:330px;left:380px" class="btn btn-primary btn_submit_transaction">{{ $Modo=='crear'? 'Agregar': 'Modificar'}}</button>
</div>
</div>
</div>
