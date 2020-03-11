
@extends('layouts.app')


@section('content')

    <section class="content-header">

    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-9">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Registrar Detalles</h3>
            </div>
            

            {!! Form::open(['route' =>'details.store','id'=>'form_Detail','method'=> 'POST','class' => 'form-horizontal']) !!}
                @include('details.partials.form',['Modo'=>'crear'])
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </section>
@endsection