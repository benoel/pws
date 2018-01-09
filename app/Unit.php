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
	public function other_transactions()
	{
		return $this->hasMany('App\OtherTransaction');
	}
}
