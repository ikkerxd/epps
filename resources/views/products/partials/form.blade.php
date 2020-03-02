

<div class="row">
  <div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="text">Nombre del Producto</label>
    {!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Ingresa Producto']) !!}
  </div>
  </div>
  <div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="text">Descripcion</label>
    {!! Form::text('descripcion', null, ['class' => 'form-control','placeholder' => 'Ingresa descripcion']) !!}
  </div>
  </div>

</div>
<div class="row">
<div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="text">Contenido</label>
    <{!! Form::text('contenido', null, ['class' => 'form-control','placeholder' => 'Ingresa Contenido']) !!}
  </div>
  </div>
<div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="text">Precio del Producto</label>
    {!! Form::text('price', null, ['class' => 'form-control','placeholder' => 'Ingresa Producto']) !!}
  </div>
  </div>

</div>
<div class="row">
<div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="text">Unidad de Medida</label>
    <{!! Form::text('unidad_medida', null, ['class' => 'form-control','placeholder' => 'Ingresa Medida']) !!}
  </div>
  </div>
<div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="text">Marca del Producto</label>
    {!! Form::text('marca', null, ['class' => 'form-control','placeholder' => 'Ingresa Marca']) !!}
  </div>
  </div>

</div>
<div class="row">
<div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="text">Color del Producto</label>
    <{!! Form::text('color', null, ['class' => 'form-control','placeholder' => 'Ingresa Color']) !!}
  </div>
  </div>
<div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="text">Ficha Tecnica</label>
    {!! Form::text('ficha_tecnica', null, ['class' => 'form-control','placeholder' => 'Ingresa Ficha Tecnica']) !!}
  </div>
  </div>

</div>

  <div class="row">
    <div class="text-center">
        <button type="submit" class="btn btn-primary btn_submit_register">Guardar</button>
    </div>
</div>