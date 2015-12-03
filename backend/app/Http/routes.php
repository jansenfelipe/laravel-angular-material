<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


use Illuminate\Http\Request;

Route::get('/pessoas', ['middleware' => 'cors', function (Request $request) {

    //Filtro
    $limit = $request->get('limit', 15);

    //Order
    $order = $request->get('order', 'nome');
    $by = $request->get('by', $order{0}=='-'?'DESC':'ASC');

    return \App\Pessoa::orderBy(str_replace('-', '', $order), $by)->paginate($limit);
}]);
