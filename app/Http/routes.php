<?php
Route::get('/macs', 'MacController@lista');
Route::get('/macs/adiciona', 'MacController@adiciona');
Route::get('/usuarios', 'UsuariosController@lista');
Route::get('/macs/detalhe', 'MacController@mostra');
Route::get('/macs/novo', 'MacController@novo');
Route::get('/mact', 'MacController@menu');
Route::get('/autocomplete',array( 'as'=>'autocomplete','uses'=>'MacController@autocomplete'));
Route::get('/aplicar', 'ExecutarController@aplicar');
Route::get('/discovery', 'DiscoveryController@lista');