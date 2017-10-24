<?php

// Admin namespace
Route::get('/', function(){
	return redirect('');
});


Route::resource('/admin', 'AdminController');
Route::get('admin/{id}/change_password', 'AdminController@change_password')->name('admin.change_password');
Route::put('admin/{id}/update_password', 'AdminController@update_password')->name('admin.update_password');

Route::resource('/tenant', 'TenantController', ['names' => 'admin.tenant']);




