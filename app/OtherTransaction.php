<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherTransaction extends Model
{
	protected $guarded = [];

	public function unit()
	{
		return $this->belongsTo('App\Unit');
	}
	
}
