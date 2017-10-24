<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
	protected $guarded = [];
	
	public function units()
	{
		return $this->hasMany('App\Unit');
	}
}
