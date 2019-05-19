<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
       <p>La propuesta escogida es:</p>
    
    <?php
      use App\propuesta;
      $enlace_actual = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
      $propuesta_id=basename($enlace_actual);
      $propuesta=new propuesta;
      $propuesta=propuesta::find($propuesta_id)
    ?>
    <div>
      <p>id de propuesta:&nbsp; {{$propuesta->id}}</p>
    </div>
    <div>
      <p>cantidad:&nbsp;{{$propuesta->cantidad}}</p>
    </div>
    <div>
      <p>interés:&nbsp;{{$propuesta->interes}}</p>
    </div>
    <div>
      <p>usuario_id:&nbsp; {{$propuesta->usuario_id}}</p>
    </div>
    <div>
      <p>descripción:&nbsp;{{$propuesta->descripcion}}</p>
    </div>
    <div>
      <p>cantidad de cuotas:&nbsp;{{$propuesta->cantidad_cuotas}}</p>
    </div>
    <div>
      <p>plazo:&nbsp;{{$propuesta->plazo}}</p>
    </div>
    <div>
      <p>nombre de usuario:&nbsp;{{$propuesta->usuario_name}}</p>
    </div>

     <form action="" method="POST" class="formulario">
                    <p class="titleFormulario">La propuesta será enviada a una de nuestras páginas aliadas, escoja la página para iniciar la conexión</p>
                <div> 
                     <label for="pagina">pagina</label>
                        <select name="categoria_id" id="categoria_id" class="form-control">
                            <option value="">--Escoja una página--</option>
                            <option value="1">2</option>
                            <option value="2">3</option>
                </div>
                    <input type="submit" name="submit" id="Submit">
                    <input type="hidden" name="_token" value="{{csrf_token() }}">
                </form>

    </body>


</html>