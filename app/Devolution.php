<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devolution extends Model
{
	protected $guarded = [];

	public function fromUser()
	{
		return $this->belongsTo('App\User', 'from_user');
	}

	public function toUser()
	{
		return $this->belongsTo('App\User', 'to_user');
	}
	
	// public function devolution_details()
	// {
	// 	return $this->hasMany('App\DevolutionDetail');
	// }

	public function devolution_details()
	{
		return $this->belongsToMany('App\Unit', 'devolution_details')->withTimestamps();
	}

}
