<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaccione;
use App\User;
use Illuminate\support\Facades\Input;
use Illuminate\support\Facades\Auth;

class test extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("transacciones");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingreso=Input::get("ingreso");
        $transaccion = new transaccione;
        $user=User::find(Auth::user()->id);

        $transaccion->tipo=Input::get("categoria_id");
        if (Input::get("categoria_id")==1) {
            $transaccion->descripcion="Ingreso";
            $transaccion->cantidad= $ingreso;
            $user->saldo=$user->saldo+$ingreso;

        }
       if (Input::get("categoria_id")==2) {
            $transaccion->descripcion="Gasto";
            $transaccion->cantidad=$ingreso;
             $user->saldo=$user->saldo-$ingreso;
        }

        $transaccion->nombre=Input::get("nombre");
        $transaccion->usuario_id=Auth::user()->id;
        $transaccion->save();
        $user->save();

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
