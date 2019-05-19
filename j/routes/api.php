<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('propuestas',function(){
	return datatables()
		->eloquent(App\propuesta::query())
		->addColumn('btn','actions')
		->rawColumns(['btn'])
		->toJson();
});

Route::get('propuestas1',function(){
	return datatables()
		->eloquent(App\propuesta::query())
		->addColumn('btn','actionss')
		->rawColumns(['btn'])
		->toJson();
});




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('propuestasFinanzas','finanzasController',['only'=>['index','store']],['middleware' => 'cors']);
Route::resource('peticion','presController',['only'=>['index','store','show']],['middleware'=>'cors']);