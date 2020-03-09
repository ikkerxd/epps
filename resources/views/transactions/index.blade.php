@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Transacciones</h2>
            </div>
            <div class="pull-right">
                @can('transaction-create')
                <a class="btn btn-success" href="{{ route('transactions.create') }}"> Create New Transaccion</a>
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
            <th>Nro Guia</th>
            <th>Fecha</th>
            <th>Total</th>
            <th>Usuario</th>
            
            
            <th width="280px">Action</th>
        </tr>
	    @foreach ($transaction as $transaction)
	    <tr>
	        <td>{{$loop->iteration}}</td>
	        <td>{{ $transaction->nro_transaction }}</td>
	        <td>{{ $transaction->nro_guide }}</td>
            <td>{{ $transaction->date }}</td>
            <td>{{ $transaction->total }}</td>
            <td>{{$user->name}}</td>
            
	        <td>
                <form action="{{ route('transactions.destroy',$transaction->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('transactions.show',$transaction->id) }}">Show</a>
                    @can('transaction-edit')
                    <a class="btn btn-primary" href="{{ route('transactions.edit',$transaction->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('transaction-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


<p class="text-center text-primary"><small>EPPS</small></p>
@endsection