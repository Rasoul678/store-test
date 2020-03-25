<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model implements CartItemInterface
{
    protected $table = 'cart_items';
    protected $fillable = [
        'product_id',
        'shopping_cart_id',
        'quantity',
        'price',
        'total_price',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    static public function totalPrice($cart_item)
    {
        return $cart_item->quantity * $cart_item->price;
    }

    public function getProduct()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getShoppingCart()
    {
        return $this->belongsTo(ShoppingCart::class, 'shopping_cart_id');
    }
}
