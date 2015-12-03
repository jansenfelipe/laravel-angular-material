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
    $like = $request->get('like');
    $limit = $request->get('limit', 15);

    //Order
    $order = $request->get('order', 'ASC');
    $by = $request->get('by', 'nome');

    return \App\Pessoa::orderBy($by, $order)->paginate();
}]);
