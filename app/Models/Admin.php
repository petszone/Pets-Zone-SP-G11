<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, SoftDeletes, HasRoles;
    protected $guard = 'admin';
    protected $table = 'admins';
    protected $fillable = [
        'name',
        'email',
        'password',
        'admin_image',
    ];

    protected $hidden = [
        'password',
    ];
}