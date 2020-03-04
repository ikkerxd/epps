@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                <a class="btn btn-success" href="{{ route('category.create') }}"> Create New Product</a>
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
            
            
            <th>Nombre Categoria</th>
            <th>Action</th>
            
            <th width="280px">Action</th>
        </tr>
	    @foreach ($category as $category)
	    <tr>
	        
	        <td>{{ $category->name }}</td>
            
	        <td>
                <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('category.show',$category->id) }}">Show</a>
                    @can('category-edit')
                    <a class="btn btn-primary" href="{{ route('category.edit',$category->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('category-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


<p class="text-center text-primary"><small>EPPS</small></p>
@endsection