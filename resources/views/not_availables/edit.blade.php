
@extends('layouts.app')
@section('content')


<section class="content-header">

</section>

<section class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Especificacion Producto</h3>
        </div>
        {!! Form::model($notavailable, ['route' => ['notavailables.update', $notavailable->id],'method'=>'PUT' ,'id'=>'form_Transaccion' ,'class' => 'form-horizontal']) !!}
        @include('notavailables.partials.form',['Modo'=>'editar'])
        {!! Form::close() !!}
        
      </div>
    </div>
  </div>
</section>
@endsection
