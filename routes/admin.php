<?php

// Admin namespace
Route::group(['middleware' => ['admin']], function () {
	//HOME
	Route::get('/', function(){
		return redirect('');
	});

	//ADMIN
	Route::resource('/admin', 'AdminController');
	Route::get('admin/{admin}/change_password', 'AdminController@change_password')->name('admin.change_password');
	Route::put('admin/{admin}/update_password', 'AdminController@update_password')->name('admin.update_password');
	Route::post('admin/block_user', 'AdminController@block_user')->name('admin.block_user');
	Route::post('admin/active_user', 'AdminController@active_user')->name('admin.active_user');
	//TENANT
	Route::resource('/tenant', 'TenantController', ['names' => 'admin.tenant']);
	Route::post('tenant/block_user', 'TenantController@block_user')->name('admin.tenant.block_user');
	Route::post('tenant/active_user', 'TenantController@active_user')->name('admin.tenant.active_user');
	//UNIT
	Route::resource('/unit', 'UnitController', ['names' => 'admin.unit']);

	//RENT
	Route::resource('/rent', 'RentController', ['names' => 'admin.rent']);
	Route::get('/rent/{rent}/agreement', 'RentController@agreement')->name('admin.rent.agreement');
	Route::get('/rent/{rent}/invoice', 'RentController@invoice')->name('admin.rent.invoice');

	//RENT PAYMENT
	Route::resource('/rent/{rent}/rent_payment', 'RentPaymentController', ['names' => 'admin.rent_payment']);
	Route::get('/rent/{rent}/rent_payment/{rent_payment}/receipt', 'RentPaymentController@receipt')->name('admin.rent_payment.receipt');

	//DEVOLUTION
	Route::resource('/devolution', 'DevolutionController', ['names' => 'admin.devolution']);
	Route::get('/devolution/{devolution}/agreement', 'DevolutionController@agreement')->name('admin.devolution.agreement');
	Route::get('/devolution/{devolution}/receipt', 'DevolutionController@receipt')->name('admin.devolution.receipt');
	
	//DEVOLUTION DETAIL
	Route::resource('/devolution/{devolution}/devolution_detail', 'DevolutionDetailController', ['names' => 'admin.devolution_detail']);

	//OTHER TRANSACTION
	Route::resource('/other_transaction', 'OtherTransactionController', ['names' => 'admin.other_transaction']);
	Route::get('/other_transaction/{other_transaction}/receipt', 'OtherTransactionController@receipt')->name('admin.other_transaction.receipt');

	//REPORT
	Route::resource('/report', 'ReportController', ['names' => 'admin.report']);
	Route::post('/report/result', 'ReportController@result')->name('admin.report.result');






	//DATA MASTER
	//Block
	Route::resource('/block', 'BlockController', ['names' => 'admin.block']);
	//Floor
	Route::resource('/floor', 'FloorController', ['names' => 'admin.floor']);
	//Type
	Route::resource('/type', 'TypeController', ['names' => 'admin.type']);
	//BusinessField
	Route::resource('/business_field', 'BusinessFieldController', ['names' => 'admin.business_field']);
	//ServiceCharge
	Route::resource('/service_charge', 'ServiceChargeController', ['names' => 'admin.service_charge']);
	//DevolutionCost
	Route::resource('/devolution_cost', 'DevolutionCostController', ['names' => 'admin.devolution_cost']);

});




