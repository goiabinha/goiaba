<?php
Route::group(['middleware' => ['web']], function () {
    Route::controllers([
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
    ]);
    Route::auth();
    Route::get('auth/logout', 'Auth\AuthController@logout');
    Route::get('/home', 'HomeController@index');
    Route::get('/macs', 'MacController@lista');
    Route::get('/', 'HomeController@index');
    Route::get('/macs/adiciona', 'MacController@adiciona');
    Route::get('/macs/altera', 'MacController@altera');
    Route::get('/macs/excluir/{id}', 'MacController@excluir');
    Route::get('/macs/detalhe/{id}', 'MacController@detalhe');
    Route::get('/macs/novo', 'MacController@novo');
    Route::get('/macs/novo/{mac}', 'MacController@novo');
    Route::get('/macs/editar/{M}', 'MacController@editar');
    // Usuarios
    Route::get('/usuarios', 'UsuariosController@index')->name('usuarios.index');
    Route::get('/usuarios/novo', 'UsuariosController@create')->name('usuarios.create');
    Route::post('/usuarios', 'UsuariosController@store')->name('usuarios.store');
    Route::get('/usuarios/{id}/edit', 'UsuariosController@edit')->name('usuarios.edit');
    Route::get('/usuarios/{id}/confirm', 'UsuariosController@confirm')->name('usuarios.confirm');
    Route::put('/usuarios/{id}', 'UsuariosController@update')->name('usuarios.update');
    Route::delete('/usuarios/{id}', 'UsuariosController@destroy')->name('usuarios.destroy');
    // Dispositivos
    Route::get('/dispositivos', 'DispositivosController@index')->name('dispositivos.index');
    Route::get('/dispositivos/novo', 'DispositivosController@create')->name('dispositivos.create');
    Route::post('/dispositivos', 'DispositivosController@store')->name('dispositivos.store');
    Route::get('/dispositivos/{id}/edit', 'DispositivosController@edit')->name('dispositivos.edit');
    Route::get('/dispositivos/{id}/confirm', 'DispositivosController@confirm')->name('dispositivos.confirm');
    Route::put('/dispositivos/{id}', 'DispositivosController@update')->name('dispositivos.update');
    Route::delete('/dispositivos/{id}', 'DispositivosController@destroy')->name('dispositivos.destroy');
    //
    Route::get('/macs/detalhe', 'MacController@mostra');
    Route::get('/mact', 'MacController@menu');
    Route::get('/autocomplete', array('as' => 'autocomplete', 'uses' => 'MacController@autocomplete'));
    Route::get('/aplicar', 'ExecutarController@aplicar');
    Route::get('/discovery', 'DiscoveryController@lista');
});
