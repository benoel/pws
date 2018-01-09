<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RentPayment;

class Rent extends Model
{
	protected $guarded = [];

	public function user()
	{
		return $this->belongsTo('App\User');
	}
	public function create_by()
	{
		return $this->belongsTo('App\User', 'created_by');
	}
	public function unit()
	{
		return $this->belongsTo('App\Unit');
	}
	public function rent_payments()
	{
		return $this->hasMany('App\RentPayment');
	}



	public function GetPpnAttribute(){
		$ppn = $this->total_cost * 10 / 100;
		return $ppn;
	}
	public function GetPphAttribute(){
		$pph = $this->total_cost * 10 / 100;
		return $pph;
	}
	public function GetGrandTotalAttribute(){
		return $this->total_cost + $this->ppn + $this->pph;
	}

	public function GetRemainPaymentAttribute(){
		$rent_payments = RentPayment::where('rent_id', $this->id)->sum('payment_amount');

		return $this->grand_total - $rent_payments;
	}

	public function GetStatusAttribute(){
		$rent_payments = RentPayment::where('rent_id', $this->id)->sum('payment_amount');

		if ($rent_payments == $this->grand_total) {
			return 'Lunas';
		}else{
			return 'Belum lunas';
		}
	}
	public function GetSubtotalAttribute(){
		return 'Rp '.number_format($this->unit->cost * $this->rent_length, 0, '.', '.');
	}

	public function GetPaymentPerMonthAttribute(){
		return 'Rp '.number_format($this->total_cost / $this->rent_length, 0, '.', '.');
	}

	public function GetEndRentAttribute(){
		return $this->created_at->addMonths($this->rent_length)->format('d M Y');
	}

	public function GetServiceChargePerMonthAttribute(){
		return $this->service_charge / $this->rent_length;
	}

}
