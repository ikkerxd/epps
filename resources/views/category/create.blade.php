
@extends('layouts.app')

@section('content')

    <section class="content-header">

    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Registrar Categorias</h3>
            </div>
            

            {!! Form::open(['route' =>'category.store','id'=>'form_Category','method'=> 'POST','class' => 'form-horizontal']) !!}
                @include('category.partials.form')
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </section>
@endsection