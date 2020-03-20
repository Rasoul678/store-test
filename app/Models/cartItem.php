<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cartItem extends Model implements CartItemInterface
{
    protected $table = 'cart_items';
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'quantity',
        'price',
    ];

    public function getProduct()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getShoppingCart()
    {
        return $this->belongsTo(ShoppingCart::class, 'shopping_cart_id');
    }
}
