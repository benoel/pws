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
	Route::resource('/tenant', 'TenantController');
});





