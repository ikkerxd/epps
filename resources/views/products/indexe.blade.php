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


    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Categoria</th>
            <th>Name</th>
            <th>Descripcion</th>
            <th>price</th>
            <th>Stock</th>
            <th>Unidad Medida</th>
            <th>Imagen</th>
            <th>Marca</th>
            
            <th width="280px">Action</th>
        </tr>
	    @foreach ($products as $product)
	    <tr>
	        <td>{{$loop->iteration}}</td>
	        <td>{{ $product->nameCategory }}</td>
	        <td>{{ $product->nameProduct }}</td>
            <td>{{ $product->descripcion }}</td>
            <td>{{ $product->price }}</td>
            <td>{{$product->stock}}</td>
            <td>{{ $product->unidad_medida }}</td>
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
    </table>


<p class="text-center text-primary"><small>EPPS</small></p>
@endsection