@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">                 
        <div class="col-md-8 text-center">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Buscar producto ...">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img class="d-block w-100" src="{{asset('images/slid_01.jpg')}}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="{{asset('images/slid_02.jpg')}}" alt="First slide">
                        </div>                
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>           
              
</div>



@endsection
