<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'attributes';
    protected $fillable = [
        'attribute_type_id',
        'label',    //name
        'pos',      //position null
        'status',   //default 1
    ];

    public function AttributeType()
    {
        return $this->belongsTo(AttributeType::class);
    }
}
