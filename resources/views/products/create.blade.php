
@extends('layouts.app')
@endsection

@section('content')

    <section class="content-header">

    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-9">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Registrar Productos</h3>
            </div>
            {!! Form::open(['route' => 'products.store','id'=>'form_Products', 'id'=>'form_Products','class' => 'form-horizontal']) !!}
                @include('products.partials.form')
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </section>
@endsection