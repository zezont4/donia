<?php
Route::get('home', function () {
	return view('home');
});

// Authentication routes...
Route::get('auth/login',['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login',['as' => 'auth.login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout',['as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register',['as' => 'auth.register', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register',['as' => 'auth.register', 'uses' => 'Auth\AuthController@postRegister']);


Route::get('/', ['as' => 'home', 'uses' => 'WelcomeController@index']);
//Route::get('home', ['as' => 'home', 'uses' => 'WelcomeController@index']);
Route::get('contact_us', ['as' => 'contactUs', 'uses' => 'WelcomeController@contactUs']);

//Route::group(array('prefix' => 'admin'), function () {
//	get('logs', ['as' => 'logViewer.index', 'uses' => '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index', 'permission' => 'log2-viewer-index']);
//	get('permission', ['as' => 'permission.index', 'uses' => 'PermissionController@index', 'permission' => 'permission-index']);
//	get('permission/{permission_id}/edit', ['as' => 'permission.edit', 'uses' => 'permissionController@edit', 'permission' => 'permission-edit']);
//	put('permission/{permission_id}/update', ['as' => 'permission.update', 'uses' => 'permissionController@update', 'permission' => 'permission-edit']);
//});

/**
 * client
 **/
Route::get('client/{client_id}/show', ['as' => 'client.show', 'uses' => 'ClientController@show', 'permission' => 'client-search']);
Route::get('search/client', ['uses' => 'ClientController@search', 'as' => 'client.search', 'permission' => 'client-search']);
Route::get('clients', ['as' => 'client.index', 'uses' => 'ClientController@index', 'permission' => 'client-index']);
//wt = With Trashed
Route::get('client/{client_id_wt}/edit', ['as' => 'client.edit', 'uses' => 'ClientController@edit', 'permission' => 'client-edit']);
Route::put('client/{client_id_wt}/update', ['as' => 'client.update', 'uses' => 'ClientController@update', 'permission' => 'client-edit']);

Route::get('client/create', ['as' => 'client.create', 'uses' => 'ClientController@create', 'permission' => 'client-create']);
Route::post('client', ['as' => 'client.store', 'uses' => 'ClientController@store', 'permission' => 'client-create']);

Route::DELETE('client/{client_id}', ['as' => 'client.destroy', 'uses' => 'ClientController@destroy', 'permission' => 'client-destroy']);
Route::post('client/{client_id_wt}/restore', ['as' => 'client.restore', 'uses' => 'ClientController@restore', 'permission' => 'client-restore']);

/**
 * contract
 **/
Route::get('search/contract', ['as' => 'contract.search', 'uses' => 'ClientController@contract', 'permission' => 'contract-search']);
Route::get('contract', ['as' => 'contract.index', 'uses' => 'ContractController@index', 'permission' => 'contract-search']);

Route::get('client/{client_id}/newTicket', ['as' => 'contract.newTicket', 'uses' => 'ContractController@newTicket', 'permission' => 'contract-create']);
Route::post('client/{client_id}/store', ['as' => 'contract.store', 'uses' => 'ContractController@store', 'permission' => 'contract-create']);

Route::get('contract/{contract_id}/edit', ['as' => 'contract.edit', 'uses' => 'ContractController@edit', 'permission' => 'contract-edit']);
Route::put('contract/{contract_id}/update', ['as' => 'contract.update', 'uses' => 'ContractController@update', 'permission' => 'contract-edit']);

Route::get('contract/{contract_id}/show', ['as' => 'contract.show', 'uses' => 'ContractController@show', 'permission' => 'contract-show']);
Route::get('contract/{contract_id}/show1', ['as' => 'contract.show1', 'uses' => 'ContractController@show1', 'permission' => 'contract-show1']);


/*Technical routes*/

/* Show */
Route::get('technical/{technical_id}/show', ['as' => 'technical.show', 'uses' => 'TechnicalController@show', 'permission' => 'technical-show']);

/* Search */
Route::get('search/technical', ['as' => 'technical.search', 'uses' => 'TechnicalController@search',  'permission' => 'technical-search']);
Route::any('searchResult/technical/{orderBy?}', ['as' => 'technical.searchResult', 'uses' => 'TechnicalController@searchResult', 'permission' => 'technical-search']);

/* Edit */
//wt = With Trashed
Route::get('technical/{technical_id_wt}/edit', ['as' => 'technical.edit', 'uses' => 'TechnicalController@edit', 'permission' => 'technical-edit']);
Route::put('technical/{technical_id_wt}/update', ['as' => 'technical.update', 'uses' => 'TechnicalController@update', 'permission' => 'technical-edit']);

/* Create */
Route::get('technical/create', ['as' => 'technical.create', 'uses' => 'TechnicalController@create', 'permission' => 'technical-create']);
Route::post('technical', ['as' => 'technical.store', 'uses' => 'TechnicalController@store', 'permission' => 'technical-create']);

/* Delete */
Route::DELETE('technical/{technical_id}', ['as' => 'technical.destroy', 'uses' => 'TechnicalController@destroy', 'permission' => 'technical-destroy']);
Route::post('technical/{technical_id_wt}/restore', ['as' => 'technical.restore', 'uses' => 'TechnicalController@restore', 'permission' => 'technical-restore']);

/************************************************/