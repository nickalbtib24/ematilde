<?php
Route::group([
    'middleware' => 'api',
], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('signup', 'AuthController@signup');
    Route::post('verify/{token}', 'AuthController@verifyUser');

    //--------Routes for TipoClientes
    Route::get('tipo_clientes','TipoClienteController@getTipoClientes');

    //--------Routes for Profile
    Route::get('clients','PerfilController@getClients');
    //--------Routes for informeClientes
    Route::get('informe_clientes/{id}','InformeClienteController@getKpi');
    //--------Routes for campanas
    Route::get('campanas_user/{id}','CampanaController@getCampanasByUser');
    //--------Routes for informe campanas
    Route::get('campana_inform/{id}','CampanaController@getInformeCampana');
    Route::post('campana_new', 'CampanaController@addNewCampaign');        
    //--------Routes for informe campanas
    Route::get('campaigns_type', 'TipoCampanaController@getTipoCampanas');

    Route::post('new_inform', 'InformeCampanaController@createInformeCampana');
    Route::post('new_report_file','InformeCampanaController@createInformeCampanaFile');

    Route::get('user/{id}','UserController@getUserById');
    Route::post('modifyUser','UserController@modifyUser');

    Route::post('new_asset','AssetController@addAsset');
    Route::get('assets_campaign/{id}', 'CampanaController@getAssetsByCampaign');

    Route::get('asset_image/{id}','AssetController@getAssetImage');

    Route::post('add_asset_report','InformeAssetController@addReportAsset');
    Route::get('get_report_asset/{id}', 'AssetController@getAssetReport');

    Route::delete('delete_campaign/{id}', 'CampanaController@deleteCampaign');
});

