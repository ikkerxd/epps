
@extends('layouts.app')

@section('content')
  <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Mostrar Productos &nbsp &nbsp<a class="btn btn-primary" href="{{ route('products.index') }}"> Volver</a></h2>
                
            </div>
            <div class="pull-right">
                <br>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nro Transaccion:</strong>
                {{ $transaction->nro_transaction }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tipo Transaccion:</strong>
                {{ $transaction->type }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nro Guia:</strong>
                {{ $transaction->nro_guide }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha:</strong>
                {{ $transaction->date }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total:</strong>
                {{ $transaction->total }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Proceso de Transaccion:</strong>
                {{ $transaction->process }}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Color:</strong>
                {{ $product->color }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Igv:</strong>
                {{ $product->igv }}
            </div>
        </div>
        
       
    
@stop