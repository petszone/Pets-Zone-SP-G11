<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'title',
        'address',
        'description',
        'ads_type',
        'image',
        'city_id',
        'user_id',
        'email',
        'phone',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function getNameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}