<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

//TODO:Add interface and document
class ShoppingCart extends Model
{
    protected $table = 'shopping_carts';
    protected $fillable = [
        'customer_id',
        'status',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    static public function addItem(Product $product, ShoppingCart $shopping_cart, $quantity = 1)
    {
        $shopping_cart = ShoppingCart::firstOrCreate([
//            'customer_id' => Auth::user()->id,
            'customer_id' => 1,//TODO: Change customer_id
        ]);
        $cart = CartItem::where(['shopping_cart_id' => $shopping_cart->id, 'product_id' => $product->id])->first();
        if (!$cart) {
            $cart_item = new CartItem([
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $product->price,
            ]);
            $cart_item->total_price = CartItem::totalPrice($cart_item);
            $shopping_cart->getCartItem()->save($cart_item);
        } else {
            $cart->increment('quantity');
            $cart->total_price = CartItem::totalPrice($cart);
            $cart->save();
        }
    }

    public function getCustomer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function getCartItem()
    {
        return $this->hasMany(CartItem::class, 'shopping_cart_id');
    }
}
