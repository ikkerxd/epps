@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            <h2><font color="black" size="6" face="verdana">Resultados de Busqueda</font></h2>
            
            </div>
            <br>
            
        </div>
    </div>

    
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        

     <div class="table-responsive">
    <table class="table table-hover">
    
        <tr class="bg-info">
            <th scope="col" >#</th>
            <th scope="col" >Categoria</th>
            <th scope="col" >Name</th>
            <th scope="col" >Descripcion</th>
            <th scope="col" >Price</th>
            <th scope="col" >Stock</th>
            <th scope="col" >Unidad Medida</th>
            <th scope="col" >Imagen</th>
            <th scope="col" >Marca</th>
            
            <th width="280px">Action</th>
        </tr>
        {{-- @if (count($description)) --}}
	    @foreach ($products as $product)
	    <tr>
	        <th scope="row">{{$loop->iteration}}</th>
	        <td>{{ $product->nameCategory }}</td>
	        <td>{{ $product->nameProduct }}</td>
            <td>{{ $product->description }}</td>    
            <td>{{ $product->price }}</td>
            <td>{{$product->stock}}</td>
            <td>{{ $product->metric }}</td>   
                 
            <td>
            <img  style= "width:200px;  background-color: #EFEFEF;" class="rounded-circle" src="{{asset('images').'/'.$product->image}}" alt="">
            </td>
            <td>{{ $product->brand }}</td>
	        <td >
                   
                    @can('product-create')
                    <a class="btn btn-primary text:center "  style="position:absolute;left:1190px" href="{{ route('transactions.create',$product->id) }}">Ver Producto</a>
                    @endcan
                    <br>
                    <br>
                    <br>
                    @can('product-create')
                    <a class="btn btn-link text:center "  style="position:absolute;left:1150px" href="{{route('notavailables.create')}}">Producto no encontrado?</a>
                   
                    @endcan
	        </td>
            
	    </tr>
        
	    @endforeach
        {{-- @endif --}}
    </table>
    </div>
  

<p class="text-center text-primary"><small>EPPS</small></p>
@endsection