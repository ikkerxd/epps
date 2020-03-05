



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
    <label for="text">Nombre</label>
    {!! Form::text('name',null, ['class' => 'form-control','placeholder' => 'Ingresa Producto']) !!}
  </div>
  </div>
  
  <div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="text">Categoria</label>
    {!! Form::select('category_id', $category, null, ['class' => 'form-control','style' => 'width: 100%;']) !!}
  </div>
  </div>

</div>

<div class="row">
<div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="text">Descripcion</label>
    {!! Form::textarea('descripcion', null, ['class' => 'form-control','id' => 'descripcion', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none','placeholder'=>'Ingrese Descripcion']) !!}
  </div>
  </div>
  <div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="text">Contenido</label>
    {!! Form::textarea('contenido', null, ['class' => 'form-control','id' => 'descripcion', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none','placeholder'=>'Ingrese Descripcion']) !!}
  </div>
  </div>
</div>

<div class="row">
<div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="text">Unidad de Medida</label>
    {!! Form::text('unidad_medida', null, ['class' => 'form-control','placeholder' => 'Ingresa Medida']) !!}
  </div>
  </div>
<div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="text">Marca</label>
    {!! Form::text('marca', null, ['class' => 'form-control','placeholder' => 'Ingresa Marca']) !!}
  </div>
  </div>

</div>
<div class="row">
<div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="text">Color del Producto</label>
    {!! Form::text('color', null, ['class' => 'form-control','placeholder' => 'Ingresa Color']) !!}
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
<div class="col-xs-12 col-sm-6">
  <div class="form-group">
  
  <label for="image">Imagen</label>
  <input type="file" id="image"  name="image"class="form-control" value="{{isset($product->image)?$product->image:''}}">
  @if(isset($product->image))
  <img  style= "width:200px;  background-color: #EFEFEF;" class="rounded-circle" src="{{asset('images').'/'.$product->image}}" alt="">
  @endif
  </div>
  </div>
<div class="col-xs-12 col-sm-6">
  
  <div class="form-group">
    <label for="text">Precio del Producto</label>
    {!! Form::number('price', null, ['class' => 'form-control','placeholder' => 'Ingresa Producto']) !!}
  </div>
  </div>

</div>
<div class="form-group">
<div class="text-center">
<button type="submit" class="btn btn-primary">{{ $Modo=='crear'? 'Agregar': 'Modificar'}}</button>
</div>
</div>
</div>
