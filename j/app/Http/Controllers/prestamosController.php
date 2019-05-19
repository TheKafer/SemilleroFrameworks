<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\prestamo;
use App\pre;

use App\User;
use Illuminate\support\Facades\Input;
use Illuminate\support\Facades\Auth;

class prestamosController extends Controller
{
    //
    public function index()
    {
    	$prestamos=prestamo::all();
    	$users=User::all();
        return view('prestamos',compact('prestamos','users'));
    }

     public function store(Request $request)
    {
        $usuarioInteresado=User::find(Auth::user()->id);
        $idpropuesta=Input::get("id");
        $valor=Input::get("valor");
        $interes=Input::get("interes");
        $plazo=Input::get("fecha_plazo");
        $cantidad_cuotas=Input::get("cuotas_max");
        $usuarioQuePresta=Input::get("user_id");
        

        $prestamo=new prestamo;
        $prestamo->cantidad_cuotas=$cantidad_cuotas;
        $prestamo->cantidad_cuotas_restantes=$cantidad_cuotas;
        $prestamo->cantidad=$valor;
        $prestamo->interes=$interes;
        $prestamo->usuario_id_endeudado=$usuarioInteresado->id;
        $prestamo->usuario_id_prestamista=$usuarioQuePresta;
        $prestamo->plazo=$plazo;
        $prestamo->pagina=2;
        $prestamo->estado=1;

        $prestamo->save();

        $usuarioInteresado->saldo=$usuarioInteresado->saldo+$valor;
        $usuarioInteresado->save();


        $prestamoA=new pre;
        $prestamoA->id_origen=$usuarioQuePresta;
        $prestamoA->id_destino=$usuarioInteresado->id;
        $prestamoA->id_oferta=$idpropuesta;
        $prestamoA->id_sistema=2;
        $prestamoA->estado_prestamo=1;
        $prestamoA->pagado=0;
        $prestamoA->save();
       
        return redirect()->route('home');



    }

     

}
