@extends('layouts.front')

@section('content')



      <div class="col-md-12">                
        <div class="input-group input-group-lg">               
                <input type="text" class="form-control" id="texto" placeholder="Buscar producto" aria-describedby="basic-addon1">
                <div class="input-group-append">
                    <button class="btn btn-info btn-lg" type="button"><i class="fas fa-search"></i></button>
                </div>
                </div>
                <div id="resultados" class="bg-light border">
        </div>  
        <br> 
 
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('danger'))
        <div class="alert alert-danger" role="alert">
        <p>{{ $message }}</p>
        </div>
        @endif
          
    <div class="col-md-12">
        <div class="form-group">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>                  
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset('images/slid_01.jpg')}}" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('images/slid_02.jpg')}}" alt="Second slide">
                  </div>
                
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
    </div>         
    <div class="col-md-12">        
        <div class="row">
            <div class="col-sm">
                <div class="card">
                    <img src="{{asset('images/slid_01.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
            <div class="col-sm">
              <div class="card">
                    <img src="{{asset('images/slid_01.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
            <div class="col-sm">
              <div class="card">
                    <img src="{{asset('images/slid_01.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
            <div class="col-sm">
                <div class="card">
                      <img src="{{asset('images/slid_01.jpg')}}" class="card-img-top" alt="...">
                      <div class="card-body">
                          <h5 class="card-title">Special title treatment</h5>
                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
              </div>
          </div>       
        
    </div> 
</div>

<script>
window.addEventListener("load",function(){
    document.getElementById("texto").addEventListener("keyup",function(){
        
        
        fetch(`/products/buscador?texto=${document.getElementById("texto").value}`,{ 
            method:'get' 
        })
                .then(response  =>  response.text() )
                .then(html      =>  {   
                    document.getElementById("resultados").innerHTML = html  
        })
           
    })
    
})
</script>   
@endsection
