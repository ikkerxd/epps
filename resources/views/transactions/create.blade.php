
@extends('layouts.app')


@section('content')

    <section class="content-header">

    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-9">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Registrar Transacciones</h3>
            </div>
            

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
            $('.datepicker').datetimepicker({
                locale: 'es',
                format: 'Y/M/D',
            });

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
