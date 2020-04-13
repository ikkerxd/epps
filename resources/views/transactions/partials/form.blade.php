

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
<div class="form-group" style="position:absolute;top:30px;left:180px" align="center">
<h4> <strong>Producto:</strong></h4>
  <br>  
  <div class="card" style="width:400px" >
  <img  style= "width:250px;  background-color: #EFEFEF;" class="rounded-circle" src="{{asset('images').'/'.$product->image}}" alt="">
    <div class="card-body">
      <h4 class="card-title">{{$product->nameproduct}}</h4>
      <p class="card-text"></p>
      <a href="#" class="btn btn-primary stretched-link">See Profile</a>
    </div>
  </div>

</div>
</div>
<div class="col-xs-12 col-sm-6">
<div class="form-group" style="position:absolute;top:30px;left:270px">
<h4> <strong>Nombre Producto:</strong></h4>
    {{ $product->nameproduct }}
    
    </div>
  </div>
</div>

<div class="row">
<div class="col-xs-12 col-sm-6">
<div class="form-group" style="position:absolute;top:30px;left:-130px">
<h4> <strong>Categoria:</strong></h4>
      {{ $product->namecategory }}
    
  </div>
</div>
<div class="col-xs-12 col-sm-15">
  <div class="form-group" style="position:absolute;top:210px;left:700px">
<h4> <strong>Descripcion:</strong></h4>
      {{ $product->description }}
    </div>
  </div>
</div>

<div class="row">
<div class="col-xs-12 col-sm-1">
  
<div class="form-group" style="position:absolute;top:370px;left:700px">
<h4> <strong>Cantidad:</strong></h4>

    {!! Form::number('quantity', null, ['class' => 'form-control','placeholder' => '+']) !!}
  </div>
  </div>

  <div class="col-xs-12 col-sm-15">
  <div class="form-group" style="position:absolute;top:150px;left:700px">
  <input type="number" name="productid" readonly style="visibility:hidden;"  class="form-control" placeholder="Name" value={{ isset($product->productid)?$product->productid:""}}>
  <input type="number" name="price" readonly style="visibility:hidden;"  class="form-control" placeholder="Name" value={{ isset($product->price)?$product->price:""}}>
    </div>
  </div>
</div>

<div class="form-group">
<div class="text-center">

<a class="btn btn-primary btn_submit_transaction btn-sm" style="position:absolute;top:35px;left:960px;" href="{{ route('transactions.quote',$user->id) }}">Lista de Cotizacion</a>
</div>
</div>

<div class="form-group">
<div class="text-center">
<button type="submit" style="position:absolute;top:570px;left:700px" class="btn btn-primary btn_submit_transaction btn-lg">Agregar al carrito</button>
</div>
</div>




