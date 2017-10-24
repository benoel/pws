<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
	protected $guarded = [];
	
	public function business_fields()
	{
		return $this->hasMany('App\BusinessField');
	}
}
