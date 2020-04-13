

@if(count($descripcion))

  @foreach($descripcion as $product)
 
    <li class="p-2 border-bottom"  ><a href="{{ route('transactions.index',$product->description) }}">{{$product->id .' - '. $product->description}} </a></li> 
 
  @endforeach
@endif
