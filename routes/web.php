<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', function () {
	if (Auth::user()->role == 1 || Auth::user()->role == 2) {
		return redirect('/admin/admin');
	}else{
		return redirect('tenant');
	}
})->middleware('auth');

Route::group(['middleware' => ['tenant']], function () {
	Route::get('/tenant/invoice', 'TenantController@invoice')->name('tenant.invoice');
	Route::get('/tenant/invoice/{invoice}/receipt', 'TenantController@receipt')->name('tenant.receipt');
	Route::get('/tenant/invoice/{invoice}/agreement', 'TenantController@agreement')->name('tenant.agreement');
	Route::get('/tenant/devolution', 'TenantController@devolution')->name('tenant.devolution');
	Route::get('/tenant/devolution/{devolution}/agreement', 'TenantController@devolution_agreement')->name('tenant.devolution.agreement');
	Route::get('/tenant/devolution/{devolution}/receipt', 'TenantController@devolution_receipt')->name('tenant.devolution.receipt');
	
	Route::resource('/tenant', 'TenantController');
	Route::get('/tenant/password/edit/{tenant}', 'TenantController@edit_password')->name('tenant.password.edit');
	Route::put('/tenant/password/{tenant}', 'TenantController@update_password')->name('tenant.password.update');



});





