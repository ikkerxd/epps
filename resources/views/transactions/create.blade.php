
@extends('layouts.app')


@section('content')

    <section class="content-header">

    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-9" >
          <div class="box box-info"  >
            <div class="box-header with-border" style='text-align:right'>
            <h3 class="box-title"> <strong> Productos no Encontrados</strong></h3>
            </div>
            <br>
            
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
          @endif
         
            {!! Form::open(['route' =>'transactions.store','id'=>'form_Transaccion','method'=> 'POST','class' => 'form-horizontal']) !!}
                @include('transactions.partials.form',['Modo'=>'crear'])
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
