<?php
Route::get('/macs', 'MacController@lista');
Route::get('/usuarios', 'UsuariosController@lista');
Route::get('/macs/detalhe', 'MacController@mostra');