<html lang="{{ app()->getLocale() }}">
<head>
    
            
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'EPPS') }}</title>
    <!-- Scripts -->
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

  

    <!-- JS -->
    <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.slim.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="{{ asset('js/moment-with-locales.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    
      <!-- CSS -->
      <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
      <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
      <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.standalone.css') }}">
      <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.standalone.min.css') }}">
      <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker3.css') }}">
      <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker3.standalone.css') }}">
      <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker3.standalone.min.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

                        <a class="navbar-brand">
                        <img  style= "width:5x;  background-color: #EFEFEF;" class="rounded-circle" src="{{asset('images').'/'.'hombre.png'}}" alt="">
                        </a>
                        <a class="navbar-brand" href="{{route('products.welcome')}}">Inicio</a>
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                       
                           
                        @guest
                        <li class="nav-item active">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                       
                       
                        </li>
                        <li class="nav-item active">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    
                        </li>
                        @else
                        <li class="nav-item active">
                        <a class="nav-link" href="{{ route('users.index') }}">Productos</a>
                        </li>
                        <li class="nav-item active">
                        <a class="nav-link" href="{{ route('transactions.list')}}">Productos Solicitados</a>
                        </li>
                        <li class="nav-item active">
                            <!-------necesario -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>


                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            </li>
                        </li>
                        @endguest
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" id="texto" placeholder="Nombre Producto" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                        <div id="resultados" class="bg-light border">
                        </div>  
                        </form>
                    </div>
                    </nav>
            
</div>
        <!-- Scripts js-->
        <script>
        window.addEventListener("load",function(){
            document.getElementById("texto").addEventListener("keyup",function(){
                
                
                fetch(`/products/buscador2?texto=${document.getElementById("texto").value}`,{ 
                    method:'get' 
                })
                        .then(response  =>  response.text() )
                        .then(html      =>  {   
                            document.getElementById("resultados").innerHTML = html  
                })
                
            })
            
        })
        </script>   
        
        <main class="py-4">
            <div class="container">
            
            @yield('content')
            @yield('js')
            
            </div>
        </main>
    </div>
</body>
</html>