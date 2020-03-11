@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Especificacion Producto</h2>
            </div>
            <div class="pull-right">
                @can('not_available-create')
                <a class="btn btn-success" href="{{ route('notavailables.create') }}"> Create New Especificacion</a>
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
	    @foreach ($notavailable as $notavailable)
	    <tr>
	        <td>{{$loop->iteration}}</td>
	        <td>{{ $notavailable->nro_transaction }}</td>
	        <td>{{ $notavailable->name }}</td>
            <td>{{ $notavailable->quantity }}</td>
            
           
	        <td>
                <form action="{{ route('notavailables.destroy',$notavailable->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('notavailables.show',$notavailable->id) }}">Show</a>
                    @can('not_available-edit')
                    <a class="btn btn-primary" href="{{ route('notavailables.edit',$notavailable->id) }}">Edit</a>
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