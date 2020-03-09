
@extends('layouts.app')


@section('content')

    <section class="content-header">

    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-9">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Registrar Especificacion de Producto</h3>
            </div>
            

            {!! Form::open(['route' =>'not_availables.store','id'=>'form_Not_available','method'=> 'POST','class' => 'form-horizontal']) !!}
                @include('not_availables.partials.form',['Modo'=>'crear'])
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </section>
@endsection
@section('js')
