
@extends('layouts.app')
@section('content')


<section class="content-header">

</section>

<section class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Transaccion</h3>
        </div>
        {!! Form::model($transaction, ['route' => ['transactions.update', $transaction->id],'method'=>'PUT' ,'id'=>'form_Transaccion' ,'class' => 'form-horizontal']) !!}
        @include('transactions.partials.form',['Modo'=>'editar'])
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
                format: 'L'
            });

            $('.timepicker').datetimepicker({
                locale: 'es',
                format: 'HH:mm A'
            });
            $('.selection-input').select2({
                theme: "bootstrap"
            });
            $('#form_Inscription').submit(function()
            {
            $('.btn_submit_register').prop('disabled',true);
            $('.btn_submit_register').html('<p><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only"></span> Registrando...</p>');
            });
        });
    </script>
@endsection