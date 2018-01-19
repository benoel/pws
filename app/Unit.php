<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
	protected $guarded = [];
	
	public function floor()
	{
		return $this->belongsTo('App\Floor');
	}
	public function block()
	{
		return $this->belongsTo('App\Block');
	}
	public function type()
	{
		return $this->belongsTo('App\Type');
	}
	public function rents()
	{
		return $this->hasMany('App\Rent');
	}
	// public function rents()
	// {
	// 	return $this->belongsToMany('App\User', 'rents')->withPivot(
	// 		'invoice_number',
	// 		'rent_length',
	// 		'service_charge',
	// 		'total_cost',
	// 		'created_by'
	// 	)->withTimestamps();
	// }
	public function other_transactions()
	{
		return $this->hasMany('App\OtherTransaction');
	}
}
