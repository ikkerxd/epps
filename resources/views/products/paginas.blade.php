

@if(count($descripcion))
  @foreach($descripcion as $product)
    <p class="p-2 border-bottom">{{$product->id .' - '. $product->name}}</p>
  @endforeach
@endif