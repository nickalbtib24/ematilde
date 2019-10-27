<?php
Route::group([
    'middleware' => 'api',
], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('signup', 'AuthController@signup');

    //--------Routes for TipoClientes
    Route::get('tipo_clientes','TipoClienteController@getTipoClientes');

    //--------Routes for Users
});

