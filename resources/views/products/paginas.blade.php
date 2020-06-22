
@empty($descripcion)
  
@else
@if(count($descripcion))

@foreach($descripcion as $product)

  <li class="p-2 border-bottom"  ><a href="{{ route('transactions.index',$product->description) }}">{{$product->id .' - '. $product->description}} </a></li> 

@endforeach
@endif
@endempty
@empty($nombres)
@else
@if(count($nombres))

  @foreach($nombres as $product)
 
    <li class="p-2 border-bottom"  ><a href="{{ route('transactions.index2',$product->name) }}">{{$product->id .'-'. $product->name}} </a></li> 
 
  @endforeach
@endif
@endempty
