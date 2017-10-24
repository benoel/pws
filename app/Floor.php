<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
	protected $guarded = [];
	
	public function units()
	{
		return $this->hasMany('App\Unit');
	}
}
