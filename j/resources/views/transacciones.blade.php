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
                <div class="form-group">
                    <form action="storeTest" method="POST">
                        <label for="">Tipo de transaccion:</label>
                        <select name="categoria_id" id="categoria_id" class="form-control" required>
                            <option value="">--Escoja una categoria--</option>
                            <option value="1">Ingresos</option>
                            <option value="2">Gastos</option>
                        </select>
                        <br>

                        <label for="ingreso">Valor:</label>
                        <input type="number" name="ingreso" id="ingreso" min=0 required>
                        <label for="nombre">Nombre de la transaccion:</label>
                        <input type="text" name="nombre" id="nombre" required>
                        <input type="submit" name="submit" id="Submit">
                        <input type="hidden" name="_token" value="{{csrf_token() }}">
                    </form>
                    

                </div>
                <div class="table">
                <h2>Historial de transacciones</h2>

				<table style="width:100%">
				  <tr>
				    <th>Descripción</th>
				    <th>Tipo</th> 
				    <th>Valor</th>
				  </tr>

			      @if(Auth::user()->transacciones->isEmpty())
                  <p>No hay transacciones disponibles</p>
                  @else
	                @foreach(Auth::user()->transacciones as $transaccion)

						<tr>
						  <td>{{$transaccion->nombre}}</td>
						  <td>{{$transaccion->descripcion}}</td>
						  <td>{{$transaccion->cantidad}}</td>
						</tr>

	                @endforeach
	           
                 @endif
                	

                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

