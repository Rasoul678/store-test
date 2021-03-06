<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model implements CartItemInterface
{
    /**
     * Specify the name of the database table.
     *
     * @var string
     */
    protected $table = 'cart_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'shopping_cart_id',
        'quantity',
        'price',
        'total_price',
        'active',
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
     * The attributes that be eager loaded on each cart item query.
     *
     * @var array
     */
    protected $with = ['getProduct'];

    /**
     * Get product of an item as a one to many relationship.
     *
     * @return BelongsTo
     */
    public function getProduct()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * Get shopping cart of an item as a one to many relationship.
     *
     * @return BelongsTo
     */
    public function getShoppingCart()
    {
        return $this->belongsTo(ShoppingCart::class, 'shopping_cart_id');
    }
}
