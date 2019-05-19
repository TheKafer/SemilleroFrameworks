<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\propuesta;

class finanzasController extends Controller
{
    public function index(Request $request){
    	$propuestas=propuesta::all();
    	return response()->json(['data'=>$propuestas]);
    }
}
