<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model implements OrderItemInterface
{
    /**
     * Specify the name of the database table.
     *
     * @var string
     */
    protected $table = 'order_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'quantity',
        'price',
        'total_price',
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
     * Get product as a one to many relationship.
     *
     * @return BelongsTo
     */
    public function getProduct()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * Get order as a one to many relationship.
     *
     * @return BelongsTo
     */
    public function getOrder()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
