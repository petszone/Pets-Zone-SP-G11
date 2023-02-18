<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttributeType extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'attribute_types';
    protected $fillable = [
        'label',    //name
        'pos',      //position null
        'status',   //default 1
    ];

    public function Attribute()
    {
        return $this->hasMany(Attribute::class);
    }
}
