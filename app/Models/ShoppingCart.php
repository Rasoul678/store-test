<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
