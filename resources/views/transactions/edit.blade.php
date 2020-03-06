
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
        {!! Form::model($transaction, ['route' => ['transactions.update', $transaction->id],'method'=>'PUT','files'=>true ,'id'=>'form_Transaccion' ,'class' => 'form-horizontal']) !!}
        @include('transactions.partials.form',['Modo'=>'editar'])
        {!! Form::close() !!}
        
      </div>
    </div>
  </div>
</section>
@endsection