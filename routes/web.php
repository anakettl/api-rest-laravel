<?php



Route::get('importView', 'ProdutosController@importView');
Route::post('import', 'ProdutosController@import')->name('import');