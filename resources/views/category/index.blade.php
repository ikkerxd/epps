@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Categorias</h2>
            </div>
            <div class="pull-right">
                @can('category-create')
                <a class="btn btn-success" href="{{ route('category.create') }}"> Create New Category</a>
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
            <th>Nombre Categoria</th>
            <th>Estado</th>
            
            <th width="280px">Action</th>
        </tr>
	    @foreach ($category as $category)
	    <tr>
            <td>{{ $loop->iteration }}</td>
	        <td>{{ $category->name }}</td>
            @if($category->state = 1)
                <td><span class="label bg-green">activo</span></td>
            @else
                <td><span class="label bg-yellow">Desactivado</span></td>
            @endif
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