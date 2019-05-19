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

           <table id="propuestas1">
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
              
           </table>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

        <script>
            $(document).ready(function() {
            $('#propuestas1').DataTable({
                "serverSide": true,
                "ajax":"{{ url('api/propuestas1') }}",
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
        </script>
    </body>
</html>