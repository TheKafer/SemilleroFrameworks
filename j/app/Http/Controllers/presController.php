<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\propuesta;

class presController extends Controller
{
	public function index(){

	}


     public function store(Request $request)
    {
        
       $campos=$request->all();

        $prestamoA=new pre;
        $prestamoA->id_origen=$campos['id_origen'];
        $prestamoA->id_destino=$campos['id_destino'];
        $prestamoA->id_oferta=$campos['id_oferta'];
        $prestamoA->id_sistema=$campos['id_sistema'];
        $prestamoA->pagina=$campos['pagina'];
        $prestamoA->pagado=0;
        $prestamoA->$campos['num_cuotas'];
        $prestamoA->save();


    }

    public function show($id){
    	 $propuesta=propuesta::find($id);
    	 return $propuesta;

    }

}
