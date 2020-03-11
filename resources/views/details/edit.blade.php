
@extends('layouts.app')
@section('content')


<section class="content-header">

</section>

<section class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Detalles</h3>
        </div>
        {!! Form::model($detail, ['route' => ['details.update', $detail->id],'method'=>'PUT' ,'id'=>'form_Detail' ,'class' => 'form-horizontal']) !!}
        @include('details.partials.form',['Modo'=>'editar'])
        {!! Form::close() !!}
        
      </div>
    </div>
  </div>
</section>
@endsection
