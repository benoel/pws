<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    protected $guarded = [];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token',
    ];

    public function rents()
    {
        return $this->hasMany('App\Rent');
    }
    public function business_field()
    {
        return $this->belongsTo('App\BusinessField');
    }
    public function create_rents(){
        return $this->hasMany('App\Rent', 'created_by');
    }
    public function devolutions_from(){
        return $this->hasMany('App\Devolution', 'from_user');
    }
    public function devolutions_to(){
        return $this->hasMany('App\Devolution', 'to_user');
    }
    // public function rents(){
    //     return $this->belongsToMany('App\Unit', 'rents')->withPivot(
    //         'invoice_number',
    //         'rent_length',
    //         'service_charge',
    //         'total_cost',
    //         'created_by',
    //     )->withTimestamps();
    // }



    public function GetRoleNameAttribute(){
        switch ($this->role) {
            case 0:
            return 'Tenant';
            break;
            case 1:
            return 'Admin';
            break;
            case 2:
            return 'Super Admin';
            break;
        }
    }

    public function isAdmin(){
        // this looks for an admin column in users table
        return $this->role == 1 || $this->role == 2 ? true : false; 
    }   
    public function isTenant(){
        // this looks for an tenant column in users table
        return $this->role == 0 ? true : false; 
    }
    public function isActive(){
        // this looks for an active column in users table
        return $this->active == 0 ? true : false; 
    }
    public function GetEndRentAttribute(){
        return $this->created_at->addMonths($this->rent_length)->format('d M Y');
    }


}
