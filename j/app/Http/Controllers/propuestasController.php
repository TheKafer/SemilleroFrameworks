<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\propuesta;
use App\transsaccione;
use App\prestamo;
use App\inversione;
use Illuminate\support\Facades\Input;
use Illuminate\support\Facades\Auth;

class propuestasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$propuestas=propuesta::all();
        //$respuesta=$this->realizarPeticion('GET','http://www.finanzas.com/api/ofertas');
        //return json_decode($respuesta,true);
        return view('tablaPropuestas',compact('propuestas'));
    }

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearPropuesta()
    {
        //$propuestas=propuesta::all(),,compact('propuestas');
        return view("crearPropuesta");
    }

    public function index2()
    {
        //$propuestas=propuesta::all(),,compact('propuestas');
        return view("tablaPropuestas2");
    }

    public function index3()
    {
        //$propuestas=propuesta::all(),,compact('propuestas');
        return view("tablaPropuestas3");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enviarDatos');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $cantidad=Input::get("cantidad");
        $interes=Input::get("interes");
        $descripcion=Input::get("descripcion");
        $plazo=Input::get("plazo");
        $cantidad_cuotas=Input::get("cantidad_cuotas");

        $propuesta= new propuesta;
        $propuesta->cantidad=$cantidad;
        $propuesta->interes=$interes;
        $propuesta->usuario_id=Auth::user()->id;
        $propuesta->descripcion=$descripcion;
        $propuesta->plazo=$plazo;
        $propuesta->cantidad_cuotas=$cantidad_cuotas;
        $propuesta->usuario_name=Auth::user()->name;
        $propuesta->estado=2;

        $propuesta->save();


        return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
         return view('enviarDatos');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarioInteresado=User::find(Auth::user()->id);
        $propuesta=propuesta::find($id);
        $usuarioQuePresta=User::find($propuesta->usuario_id);

        $usuarioInteresado->saldo=$usuarioInteresado->saldo+$propuesta->cantidad;
        $usuarioQuePresta->saldo=$usuarioQuePresta->saldo-$propuesta->cantidad;

        $prestamo=new prestamo;
        $prestamo->cantidad_cuotas=$propuesta->cantidad_cuotas;
        $prestamo->cantidad_cuotas_restantes=$propuesta->cantidad_cuotas;
        $prestamo->cantidad=$propuesta->cantidad;
        $prestamo->interes=$propuesta->interes;
        $prestamo->usuario_id_endeudado=$usuarioInteresado->id;
        $prestamo->usuario_id_prestamista=$usuarioQuePresta->id;
        $prestamo->plazo=$propuesta->plazo;
        $prestamo->pagina=1;
        $prestamo->estado=2;

        $prestamo->save();

        $usuarioInteresado->save();
        $usuarioQuePresta->save();
        $propuesta->delete();
        return redirect()->route('home');



    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
