
@extends('layouts.app')
@section('content')


<section class="content-header">

</section>

<section class="content">
  <div class="row">
    <div class="col-md-12 text-center">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Categoria</h3>
        </div>
        {!! Form::model($category, ['route' => ['category.update', $category->id],'method'=>'PUT','files'=>true ,'id'=>'form_Category' ,'class' => 'form-horizontal']) !!}
        @include('category.partials.form')
        {!! Form::close() !!}
        
      </div>
    </div>
  </div>
</section>
@endsection