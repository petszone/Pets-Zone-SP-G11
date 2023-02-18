<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProduct extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'order_products';
    protected $fillable = [
        'user_id',
        'order_id',
        'product_id',
        'quantity',
        'price',
        'pos',          //position null
        'statuspayment',
        'notes',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
