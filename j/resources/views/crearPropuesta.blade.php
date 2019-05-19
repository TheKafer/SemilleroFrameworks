<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">


        <!--  /////////////////////// -->
        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}" defer></script>  TENGO UN ERROR AQUÍ, INTERFERENCIA CON APP.BLADE.PHP-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <p class="nombreapp"> {{ config('app.name', 'Laravel') }}</p>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
                <div class="row">
                  <div class="col-xs-12 col-sm-6 offset-sm-3 col-md-6 offset-md-3">
                    
                    <ul class="nav justify-content-center">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('home')}}">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('transacciones.index')}}">Transacciones</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('propuestas.index')}}">Propuestas Finper</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('prestamos.index')}}">Prestamos</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" href="{{route('crearPropuesta')}}">Crear Propuesta</a>
                      </li>

                    </ul>
                    
                  </div>
                </div>
              </div>
              <!-- navigation bar ends here -->

        <!--Formulario Propuesta-->
                 <form action="storePropuestas" method="POST" class="formulario">
                    <p class="titleFormulario">Crear Propuesta</p>
                <div> 
                    <label for="cantidad">Cantidad a prestar</label>
                    <input type="number" name="cantidad" id="cantidad" required min="0">
                </div>
                <div>
                    <label for="interes">Interés para prestar</label>
                    <input type="number" name="interes" id="interes" step="any" min="0" max="1" required>
                </div>
                <div>
                    <label for="descripcion">Descripción</label>
                    <input type="text" name="descripcion" id="descripcion" required>
                </div>
                <div>
                    <label for="plazo">Plazo para pagar en meses</label>
                    <input type="number" name="plazo" id="plazo" min="0" required>
                </div>
                <div>
                    <label for="cantidad_cuotas">Cantidad de cuotas</label>
                    <input type="number" name="cantidad_cuotas" id="cantidad_cuotas" min="0" required="" >
                </div>
                    <input type="submit" name="submit" id="Submit">
                    <input type="hidden" name="_token" value="{{csrf_token() }}">
                </form>
        <main class="py-4">
            @yield('content')
        </main>
    </div>

       
    </body>
</html>