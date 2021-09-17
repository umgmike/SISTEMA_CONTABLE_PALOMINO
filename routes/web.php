<?php

Route::get('/', function () {
return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/login', 'OficinaContablePalomino\LoginController@index')->name('login');


Route::group(['namespace' => 'OficinaContablePalomino', 'middleware' => 'auth'], function () {

	Route::get('home', 'HomeController@HomeAdmin')->name('home_admin')->middleware('auth');
	Route::get('Listado-general', 'GeneralController@ListGeneral')->name('pages.list-general')->middleware('auth');

	Route::get('usuarios', 'UsersController@index')->name('page.usuarios')->middleware('auth');
	Route::get('usuarios/create', 'UsersController@create')->name('page.create-users')->middleware('auth');
	Route::post('usuarios/save', 'UsersController@store')->name('page.save-users')->middleware('auth');
	Route::get('usuarios/{id}/edit', 'UsersController@edit')->name('page-edit.users')->middleware('auth');
	Route::put('usuarios/{id}', 'UsersController@update')->name('page-update.users')->middleware('auth');
	Route::put('usuarios/pass/{id}', 'UsersController@update_pass')->name('page-update.users-pass')->middleware('auth');
	Route::delete('usuarios/{id}', 'UsersController@destroy')->name('page.delete')->middleware('auth');
	Route::get('roles', 'RolsController@index')->name('page.rols-user')->middleware('auth');


	Route::get('cuentas', 'AccountsController@index')->name('page.cuentas')->middleware('auth');
	Route::get('cuentas/create', 'AccountsController@create')->name('page.create.cuentas')->middleware('auth');
	Route::post('cuentas/save', 'AccountsController@store')->name('page.save-nat')->middleware('auth');
	Route::post('cuentas/saves', 'AccountsController@storeAccount')->name('page.save-acco')->middleware('auth');
	Route::get('cuentas/{id}/edit', 'AccountsController@edit')->name('page-edit.cuentas')->middleware('auth');
	Route::put('cuentas/update/{id}', 'AccountsController@update')->name('page-update.account')->middleware('auth');
	Route::get('naturaleza/{id}/edit', 'AccountsController@edit_naturaleza')->name('page-edit.naturality')->middleware('auth');
	Route::put('cuentas/{id}', 'AccountsController@update_naturaleza')->name('page-update.naturality')->middleware('auth');
	Route::delete('cuentas/{id}', 'AccountsController@destroy')->name('page.cuentas.delete')->middleware('auth');
	Route::get('Nomenclatura/pdf', 'AccountsController@nomenclatura_c')->name('nomenclatura-de-importadora-epocas')->middleware('auth');


	Route::get('Asiento', 'AsientoController@index')->name('page.inicio')->middleware('auth');
	Route::get('Asiento/create', 'AsientoController@create')->name('page.asiento-create')->middleware('auth');
	Route::resource('crear_asiento', 'AsientoController')->middleware('auth');
	Route::post('Asiento/save', 'AsientoController@store')->name('asiento.store')->middleware('auth');
	Route::post('Editar-siento/save', 'AsientoController@update')->name('asiento2.store2')->middleware('auth');
	Route::delete('Asiento/{id}', 'AsientoController@destroy')->name('page.daily.delete')->middleware('auth');
	Route::get('asientos/{id}/view', 'AsientoController@show')->name('page-show.daily')->middleware('auth');
	Route::get('asientos/pdf', 'AsientoController@pdf_asiento')->name('pdf_asientoLD')->middleware('auth');
	Route::get('asientos/pdf/download', 'AsientoController@pdf_asiento_download')->name('pdf_asientoLD_download')->middleware('auth');
	Route::get('Asiento/Desactivados', 'AsientoController@index_activar')->name('page.asientos-desactivados')->middleware('auth');
	Route::resource('asientoEditar', 'AsientoController');
	Route::get('asiento-editar/{id}', 'AsientoController@edit')->name('page.daily-edit')->middleware('auth');


	Route::get('cat/cuenta', 'CatCuentaController@index')->name('cat.list')->middleware('auth');
	Route::get('cat/cuenta/create', 'CatCuentaController@create')->name('cat.create')->middleware('auth');
	Route::post('cat/cuenta/save', 'CatCuentaController@store')->name('cat.save')->middleware('auth');
	Route::get('cat/cuenta/{id}/edit', 'CatCuentaController@edit')->name('cat-edit')->middleware('auth');
	Route::put('cat/cuenta/{id}', 'CatCuentaController@update')->name('cat-update')->middleware('auth');


	Route::get('empresas', 'EmpresasController@index')->name('page.empresas')->middleware('auth');
	Route::get('Listado-general', 'GeneralController@ListGeneral')->name('pages.list-general')->middleware('auth');

});
