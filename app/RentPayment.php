<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentPayment extends Model
{
	protected $guarded = [];

	public function rent()
	{
		return $this->belongsTo('App\Rent');
	}
}
