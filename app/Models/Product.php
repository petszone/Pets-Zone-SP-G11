<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'products';
    protected $fillable = [
        'name',    //name
        'shortdesc',    //short description
        'longdesc',    //long description
        'url',
        'price',
        'rebate',
        'taxrate',
        'instock',  //stock amount quantity
        'pos',      //position
        'status',   //default 1
    ];

    public function media()
    {
        return $this->belongsToMany(Media::class, 'product_media','product_id','media_id');
    }
}
