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

    <body>
          @if(Session::has('Mensaje'))

          <div class="alert alert-success" role="alert">

          <strong font size=7 >Aviso: </strong> {{session('flash')}}
          <button type="button" class="close" data-dismiss="alert" alert-label
           <span aria-hidden="true">&times;</span>
          </button>
       
       
          {{ Session::get('Mensaje')}}
          </div>

        @endif

        @if(Session::has('Mensaje2'))

            <div class="alert alert-danger" role="alert">

            <strong font size=7 >Aviso: </strong> {{session('flash')}}
            <button type="button" class="close" data-dismiss="alert" alert-label
            <span aria-hidden="true">&times;</span>
            </button>


            {{ Session::get('Mensaje2')}}
          </div>
          @endif

    </body>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif


    <table class="table table-bordered">
        <tr>
            
            <th>Categoria</th>
            <th>Name</th>
            <th>Descripcion</th>
            <th>price</th>
            <th>Unidad Medida</th>
            <th>Marca</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($products as $product)
	    <tr>
	        
	        <td>{{ $product->nameCategory }}</td>
	        <td>{{ $product->nameProduct }}</td>
            <td>{{ $product->descripcion }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->unidad_medida }}</td>
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