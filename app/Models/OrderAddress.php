<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderAddress extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'order_addresses';
    protected $fillable = [
        'user_id',
        'order_id',
        'firstname',
        'lastname',
        'address1',
        'address2',
        'postal',
        'city_id',
        'country_id',
        'telephone',
        'email',
        'pos',    //position null
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function getFullNameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function city()
    {
        return $this->belongsTo(City::class);    
    }
}
