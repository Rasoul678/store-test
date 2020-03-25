<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model implements OrderItemInterface
{
    protected $table = 'order_items';
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'product_id',
        'quantity',
        'price',
        'total_price',
    ];

    public function getProduct()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getOrder()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
