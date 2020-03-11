

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
    <label for="text">Transacciones</label>
    {!! Form::select('transaction.id',$transactions, null, ['class' => 'form-control' ,'style' => 'width: 100%']) !!}
  </div>
  </div>
<div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="text">Nombre Producto</label>
    {!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Ingresa Total']) !!}
  </div>
  </div>
</div>

<div class="row">
<div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="text">Cantidad</label>
    {!! Form::number('quantity', null, ['class' => 'form-control ','placeholder' => 'Ingresa nro de Transaccion']) !!}
  </div>
  </div>
</div>


<div class="form-group">
<div class="text-center">
<button type="submit" style="position:absolute;top:330px;left:380px" class="btn btn-primary btn_submit_transaction">{{ $Modo=='crear'? 'Agregar': 'Modificar'}}</button>
</div>
</div>
</div>
