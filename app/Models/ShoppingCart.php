<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class ShoppingCart extends Model implements ShoppingCartInterface
{
    /**
     * Specify the name of the database table.
     *
     * @var string
     */
    protected $table = 'shopping_carts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'status',
    ];

    /**
     * The attributes that have in date format.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * Add cart item to the shopping cart.
     *
     * @param Product $product
     * @param ShoppingCart $shopping_cart
     * @param int $quantity
     */
    static public function addItem(Product $product, ShoppingCart $shopping_cart, $quantity = 1)
    {
        $shopping_cart = ShoppingCart::firstOrCreate([
            'customer_id' => Auth::id(),
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

    /**
     * Get customer as a one to many relationship.
     *
     * @return BelongsTo
     */
    public function getCustomer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    /**
     * Get cart items as a many to one relationship.
     *
     * @return HasMany
     */
    public function getCartItem()
    {
        return $this->hasMany(CartItem::class, 'shopping_cart_id');
    }
}
