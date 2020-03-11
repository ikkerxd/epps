@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Detalles</h2>
            </div>
            <div class="pull-right">
                @can('details-create')
                <a class="btn btn-success" href="{{ route('details.create') }}"> Create New Details</a>
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
        <div class="alert alert-danger" role="alert">
        <p>{{ $message }}</p>
        </div>
        @endif


    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Nro Transaccion</th>
            <th>Nombre Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th width="280px">Action</th>

        </tr>
	    @foreach ($detail as $detail)
	    <tr>
	        <td>{{$loop->iteration}}</td>
	        <td>{{ $detail->nro_transaction }}</td>
	        <td>{{ $detail->name }}</td>
            <td>{{ $detail->quantity }}</td>
            <td>{{ $detail->price_unit }}</td>

	        <td>
                <form action="{{ route('details.destroy',$detail->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('details.show',$detail->id) }}">Show</a>
                    @can('details-edit')
                    <a class="btn btn-primary" href="{{ route('details.edit',$detail->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('details-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


<p class="text-center text-primary"><small>EPPS</small></p>
@endsection