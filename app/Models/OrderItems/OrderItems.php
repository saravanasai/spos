<?php

namespace App\Models\OrderItems;

use App\Models\Products\Products;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItems extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    protected $with=['Product'];
    protected $fillable = [
        'order_id',
        'product_id',
        'order_product_quantity',
        'total',
    ];


    public function Product():BelongsTo
    {
        return $this->belongsTo(Products::class,'product_id','id');
    }
}
