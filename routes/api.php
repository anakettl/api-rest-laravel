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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/index', 'ProdutosController@index');
//Route::get('/index/{lm}', 'ProdutosController@show');
Route::delete('/index/{id}', 'ProdutosController@destroy');
Route::put('/index/{id}', 'ProdutosController@update');

//Route::get('/index/{id}', 'ProdutosController@show');
