

@if(count($descripcion))
  @foreach($descripcion as $product)
    <li class="p-2 border-bottom"  ><a href="{{ route('products.show',$product->id) }}">{{$product->id .' - '. $product->name}} </a></li> 
  @endforeach
@endif