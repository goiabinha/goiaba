<?php
Route::get('/macs', 'MacController@novo');
Route::get('/usuarios', 'UsuariosController@lista');
Route::get('/macs/detalhe', 'MacController@mostra');
Route::get('/macs/novo', 'MacController@novo');
Route::get('/mact', 'MacController@menu');