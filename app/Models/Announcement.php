<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $table = 'announcements';
    protected $fillable = [
        'name',
        'phone',
        'email',
        'animalname',
        'animaltype',
        'image',
        'description',
        'keepanimalwith',
        'adoptanimalaftertreatment',
        'google_map_address',
    ];
}