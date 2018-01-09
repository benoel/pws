<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessField extends Model
{
	protected $guarded = [];
	
	public function users()
	{
		return $this->hasMany('App\Unit');
	}
	public function business(){
		return $this->belongsTo('App\Business');
	}
}
