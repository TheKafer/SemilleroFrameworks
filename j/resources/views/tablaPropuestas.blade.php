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

        <main class="py-4">
            @yield('content')
        </main>
    </div>



        <div class="container">
           <table id="propuestas">
               <thead>
                   <tr>
                       <th>ID</th>
                       <th>Cantidad</th>
                       <th>Interés</th>
                       <th>Usuario_ID</th>
                       <th>Descripción</th>
                       <th>Plazo en meses</th>
                       <th>Cantidad Cuotas</th>
                       <th>Usuario</th>
                       <th>&nbsp;</th>
                   </tr>
               </thead>

                   <tbody>
                      @foreach($propuestas as $propuesta)
                       @if($propuesta->usuario_id!=Auth::user()->id)
                          <tr>
                             <td>{{$propuesta->id}}</td> 
                             <td>{{$propuesta->cantidad}}</td>
                             <td>{{$propuesta->interes}}</td>
                             <td>{{$propuesta->usuario_id}}</td>
                             <td>{{$propuesta->descripcion}}</td>
                             <td>{{$propuesta->cantidad_cuotas}}</td>
                             <td>{{$propuesta->plazo}}</td>
                             <td>{{$propuesta->usuario_name}}</td>
                             <td><a href="{{ route('propuestas.edit',$propuesta->id )}}" class="btn btn-danger">Aceptar</a></td>
                          </tr>
                        @endif
                      @endforeach
                   </tbody>

           </table>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <!--    <script>
            $(document).ready(function() {
            $('#propuestas').DataTable({
                "serverSide": true,
                "ajax":"{{ url('api/propuestas') }}",
                "columns":[
                {data: 'id'},
                {data: 'cantidad'},
                {data: 'interes'},
                {data: 'usuario_id'},
                {data: 'descripcion'},
                {data: 'plazo'},
                {data: 'cantidad_cuotas'},
                {data: 'usuario_name'},
                {data: 'btn'},
                ]
            });
        });
        </script>-->

        <script>
          $(document).ready(function(){
            $('#propuestas').DataTable();
          });
        </script>
    </body>
</html>