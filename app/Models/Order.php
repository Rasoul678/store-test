<?php

namespace App\Models;

use App\Models\Enums\OrderStatus;
use BenSampo\Enum\Traits\CastsEnums;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model implements OrderInterface
{
    use SoftDeletes;
    use CastsEnums;

    /**
     * Specify the name of the database table.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'total_price',
        'status',
        'address_id',
    ];

    /**
     * The attributes that have in date format.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $enumCasts = [
        'status' => OrderStatus::class,
    ];

    protected $casts = [
        'status' => 'int',
    ];

    /**
     * Get users as a one to many relationship.
     *
     * @return BelongsTo
     */
    public function getUser()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    /**
     * Get order items as a many to one relationship.
     *
     * @return HasMany
     */
    public function getOrderItem()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    /**
     * Get address of the specified order.
     *
     * @return BelongsTo
     */
    public function getAddress()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }
}
