@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                @endcan
            </div>
        </div>
    </div>

    
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        
    
<!-- <div class="col-8">
        <div class="input-group">
            <input type="text" class="form-control" id="texto" placeholder="Ingrese nombre">
            <div class="input-group-append"><span class="input-group-text">Buscar</span></div>
        </div>
        <div id="resultados" class="bg-light border"></div>
    </div>-->
     
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Categoria</th>
            <th>Name</th>
            <th>Descripcion</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Unidad Medida</th>
            <th>Imagen</th>
            <th>Marca</th>
            <th>prueba</th>
            
            <th width="280px">Action</th>
        </tr>
        {{-- @if (count($description)) --}}
	    @foreach ($products as $product)
	    <tr>
	        <td>{{$loop->iteration}}</td>
	        <td>{{ $product->nameCategory }}</td>
	        <td>{{ $product->nameProduct }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{$product->stock}}</td>
            <td>{{ $product->metric }}</td>   
            <td>
            <p class="p-2 border-bottom">{{$product->id .' - '. $product->categoria}}</p>
             </td>       
           
            <td>
            <img  style= "width:200px;  background-color: #EFEFEF;" class="rounded-circle" src="{{asset('images').'/'.$product->image}}" alt="">
            </td>
            <td>{{ $product->marca }}</td>
	        <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                    @can('product-edit')
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('product-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
        
	    @endforeach
        {{-- @endif --}}
    </table>
  

<p class="text-center text-primary"><small>EPPS</small></p>
@endsection