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
                    
                <div class="article"><p>
                    Bienvenido a Finper, en esta aplicación podrás hacer seguimiento a tus gastos, ingresos, inversiones e incluso podrás realizar prestamos.
                </p></div>
            </div>
        </div>
    </div>
</div>
@endsection

