

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
<form>
<div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="text">Nombre Producto</label>
    {!! Form::text('name', null, ['class' => 'form-control' ,'placeholder' => 'Ingrese Nombre']) !!}
  </div>
  </div>
<div class="col-xs-12 col-sm-6">
  <div class="form-group">
    <label for="text">Descripcion</label>
    {!! Form::textarea('description', null, ['class' => 'form-control','placeholder' => 'Ingrese Descripticion']) !!}
  </div>
  </div>
</div>


<div class="col-xs-12 col-sm-6">
  <div class="form-group">
  <div class="form-group">
  
  <label for="image">Imagen</label>
  <input type="file" id="image"  name="image"class="form-control" value="{{isset($product->image)?$product->image:''}}">
    @if(isset($product->image))
  
    <img  style= "width:200px;  background-color: #EFEFEF;" class="rounded-circle" src="{{asset('images').'/'.$product->image}}" alt="">
    {!! Form::hidden('image', null, ['class' => 'form-control','placeholder' => '']) !!}

    @endif
  </div>
  </div>
  <div class="col-xs-12 col-sm-3">
  <div class="form-group">
    <label for="text">Cantidad</label>
    {!! Form::number('quantity', null, ['class' => 'form-control','style'=>'position:absolute;top:35px;left:3px','placeholder' => '+']) !!}
  </div>
  </div>
</div>


<div class="form-group">
<div class="text-center">
<button type="submit" style="position:absolute;top:600px;left:35px" class="btn btn-primary btn_submit_transaction">{{ $Modo=='crear'? 'Agregar a la Cotizacion': 'Modificar'}}</button>
</div>
</div>
</form>
