@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Productos Solicitados</h2>
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
            <th>Nombre Usuario</th>
            <th>Producto</th>
            <th>Categoria</th>
            <th>Imagen</th>
            <th>Fecha</th>
            <th>Proceso</th>
            
            
            <th width="280px">Action</th>
        </tr>
       
	    @foreach ($transactions as $transaction)
	    <tr>
	        <td>{{$loop->iteration}}</td>
	        <td>{{ $transaction->nameuser }}</td>
	        <td>{{ $transaction->productname }}</td>
            <td>{{ $transaction->namecategory }}</td>
            
           
            <td>
            <img  style= "width:200px;  background-color: #EFEFEF;" class="rounded-circle" src="{{asset('images').'/'.$transaction->image}}" alt="">
            </td>
            <td>{{$transaction->date}}</td>
            <td>{{ $transaction->proccess }}</td>   
	        <td>
               
	        </td>
	    </tr>
        
	    @endforeach
        
    </table>
  

<p class="text-center text-primary"><small>EPPS</small></p>
@endsection