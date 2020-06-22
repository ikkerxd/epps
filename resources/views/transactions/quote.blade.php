@extends('layouts.app')


@section('content')

    <section class="content-header">

    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-9" >
          <div class="box box-info"  >
            <div class="box-header with-border" style='text-align:right'>
            <h1 class="box-title" align="center"> <strong>Producto Solicitado</strong></h1>
            </div>
            <br>
            <br>
            
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
          @endif
         
            {!! Form::open(['route' =>'transactions.store','id'=>'form_Transaccion','method'=> 'POST','class' => 'form-horizontal']) !!}
            <div class="box-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Sorry!</strong> Tienes problemas con tu input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    @csrf
                <form>

                <div class="col-xs-12 col-sm-6">
                <div class="form-group">
                    <label for="text">Cliente</label>
                    <input type="text" name="productname" class="form-control"  value={{ isset($transactio->productname)?$transactio->productname:""}}>
                </div>
                </div>

                <div class="col-xs-12 col-sm-6">
                <div class="form-group">
                    <label for="text">Correo</label>
                    <input type="text" name="email" class="form-control"  value={{ isset($transactio->email)?$transactio->email:""}}>
                </div>
                </div>

                <div class="col-xs-12 col-sm-6">
                <div class="form-group">
                    <label for="text">Fecha</label>
                    <input type="text" name="date" class="form-control"  value={{ isset($transactio->date)?$transactio->date:""}}>
                </div>
                </div>



                <table class="table">
                <thead class="thead-dark">

                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$transaction->productname}}</td>
                        <td>{{$transaction->quantity}}</td>
                    </tr>
                </tbody>
                @endforeach
                </table>
                <br>
                <br>
                <table class="table">
                <h4> <strong>Productos no Encontrados</strong> </h4>
                <thead class="thead-dark">

                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($notavailables as $notavaialable)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$notavaialable->notname}}</td>
                        <td>{{$notavaialable->notquantity}}</td>
                    </tr>
                </tbody>
                @endforeach
                </table>

                <div class="form-group">
                <div class="text-center">
                <button type="submit" style="position:absolute;top:155px;left:600px" class="btn btn-primary btn_submit_transaction">Solicitar Cotizacion</button>
                </div>
                </div>
                </form>
                    

                </div>
                </div>
                </div>
            {!! Form::close() !!}
          
          </div>
        </div>
      </div>
    </section>
@endsection
@section('js')

    <script>
        $(document).ready(function () {
            
            $('.selection-input').select2({
                theme: "bootstrap"
            });
            $('#form_Transaccion').submit(function()
            {
            $('.btn_submit_transaction').prop('disabled',true);
            $('.btn_submit_transaction').html('<p><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only"></span> Registrando...</p>');
            });
        });
    </script>
@endsection
         
         
