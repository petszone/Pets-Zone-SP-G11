<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory, HasRoles;
    protected $guard_name = 'employee';

    protected $fillable = [
        'firstname', 
        'lastname',
        'phone',
        'email', 
        'connection_status',
        'password', 
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
