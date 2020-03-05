
@extends('layouts.app')
@section('content')


<section class="content-header">

</section>

<section class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Producto</h3>
        </div>
        {!! Form::model($product, ['route' => ['products.update', $product->id],'method'=>'PUT','files'=>true ,'id'=>'form_Producto' ,'class' => 'form-horizontal']) !!}
        @include('products.partials.form',['Modo'=>'editar'])
        {!! Form::close() !!}
        
      </div>
    </div>
  </div>
</section>
@endsection