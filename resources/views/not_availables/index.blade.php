@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Especificacion Producto</h2>
            </div>
            <div class="pull-right">
                @can('not_available-create')
                <a class="btn btn-success" href="{{ route('not_availables.create') }}"> Create New Especificacion</a>
                @endcan
            </div>
        </div>
    </div>

    
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('danger'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif


    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Transaccion</th>
            <th>Nombre producto</th>
            <th>Cantidad</th>
            
            <th width="280px">Action</th>
        </tr>
	    @foreach ($not_available as $notavailable)
	    <tr>
	        <td>{{$loop->iteration}}</td>
	        <td>{{ $notavailable->nro_transaction }}</td>
	        <td>{{ $notavailable->name }}</td>
            <td>{{ $notavailable->quantity }}</td>
            
           
	        <td>
                <form action="{{ route('not_availables.destroy',$not_available->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('not_availables.show',$not_available->id) }}">Show</a>
                    @can('not_available-edit')
                    <a class="btn btn-primary" href="{{ route('not_availables.edit',$not_available->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('not_available-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


<p class="text-center text-primary"><small>EPPS</small></p>
@endsection