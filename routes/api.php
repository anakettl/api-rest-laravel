<?php

use Illuminate\Http\Request;


Route::get('/index', 'ProdutosController@index');
Route::delete('/index/{id}', 'ProdutosController@destroy');
Route::put('/index/{id}', 'ProdutosController@update');


