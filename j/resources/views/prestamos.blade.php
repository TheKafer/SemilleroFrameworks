@extends('layouts.app')

@section('content')

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
  
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Finper</div>
                <div class="card-body">
                    <h1>
                    Saldo disponible: 
                    @auth
                        {{Auth::user()->saldo}}
                    @endauth
                    <h1>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                </div>
                <div class="table-hechos">
                <h2>Prestamos que hice</h2>

                <table style="width:100%">
                  <tr>
                    <th>Id</th>
                    <th>Cantidad cuotas totales</th> 
                    <th>Cantidad cuotas restantes</th>
                     <th>Cantidad</th>
                     <th>Interés</th>
                     <th>Usuario_Id Endeudado</th>
                     <th>Plazo</th>
                     <th>Página</th>
                     <th>Estado</th>

                  </tr>

                  @if(Auth::user()->prestamosAceptados->isEmpty() && Auth::user()->prestamosHechos->isEmpty())
                  <p>No haz realizado ningún prestamo</p>
                  @else
                   
                    @if(!Auth::user()->prestamosHechos->isEmpty())
                      @foreach(Auth::user()->prestamosHechos as $prestamoHecho)

                        <tr>
                          <td>{{$prestamoHecho->id}}</td>
                          <td>{{$prestamoHecho->cantidad_cuotas}}</td>
                          <td>{{$prestamoHecho->cantidad_cuotas_restantes}}</td>
                          <td>{{$prestamoHecho->cantidad}}</td>
                          <td>{{$prestamoHecho->interes}}</td>
                          <td>{{$prestamoHecho->usuario_id_endeudado}}</td>
                          <td>{{$prestamoHecho->plazo}}</td>
                          <td>{{$prestamoHecho->pagina}}</td>
                          <td>{{$prestamoHecho->estado}}</td>
                        </tr>

                     @endforeach
                    @endif 
                                       
                @endif
                  </div>


                </div>


            </div>
        </div>
    </div>
</div>


 <div class="table-aceptados">
                <table style="width:100%">
                  <tr>
                    <th>Id</th>
                    <th>Cantidad cuotas totales</th> 
                    <th>Cantidad cuotas restantes</th>
                     <th>Cantidad</th>
                     <th>Interés</th>
                     <th>Usuario_Id Prestamista</th>
                     <th>Plazo</th>
                     <th>Página</th>
                     <th>Estado</th>
                  </tr>

                  @if(Auth::user()->prestamosAceptados->isEmpty() && Auth::user()->prestamosHechos->isEmpty())
                  
                  @else
                   
                    @if(!Auth::user()->prestamosAceptados->isEmpty())
                      @foreach(Auth::user()->prestamosAceptados as $prestamoAceptado)

                        <tr>
                          <td>{{$prestamoAceptado->id}}</td>
                          <td>{{$prestamoAceptado->cantidad_cuotas}}</td>
                          <td>{{$prestamoAceptado->cantidad_cuotas_restantes}}</td>
                          <td>{{$prestamoAceptado->cantidad}}</td>
                          <td>{{$prestamoAceptado->interes}}</td>
                          <td>{{$prestamoAceptado->usuario_id_prestamista}}</td>
                          <td>{{$prestamoAceptado->plazo}}</td>
                          <td>{{$prestamoAceptado->pagina}}</td>
                          <td>{{$prestamoAceptado->estado}}</td>
                        </tr>

                     @endforeach
                    @endif 
                                       
                @endif
</div>

    <div><h2>Prestamos que acepte</h2></div>
     @if(Auth::user()->prestamosAceptados->isEmpty() && Auth::user()->prestamosHechos->isEmpty())
        <p>No ha realizado ningún prestamo</p>
     @endif
@endsection

