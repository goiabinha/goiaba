<?php
Route::group(['middleware' => ['web']], function () {
    Route::controllers([
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
    ]);
    Route::auth();
    Route::get('/home', 'HomeController@index');
    Route::get('/macs', 'MacController@lista');
    Route::get('/macs/adiciona', 'MacController@adiciona');
    Route::get('/macs/altera', 'MacController@altera');
    Route::get('/macs/excluir/{id}', 'MacController@excluir');
    Route::get('/macs/detalhe/{id}', 'MacController@detalhe');
    Route::get('/macs/novo', 'MacController@novo');
    Route::get('/macs/novo/{mac}', 'MacController@novo');
    Route::get('/macs/editar/{M}', 'MacController@editar');
    Route::get('/usuarios', 'UsuariosController@lista');
    Route::get('/macs/detalhe', 'MacController@mostra');
    Route::get('/mact', 'MacController@menu');
    Route::get('/autocomplete', array('as' => 'autocomplete', 'uses' => 'MacController@autocomplete'));
    Route::get('/aplicar', 'ExecutarController@aplicar');
    Route::get('/discovery', 'DiscoveryController@lista');
});