<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Address extends Model implements AddressInterface
{
    protected $table = 'addresses';

    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'description',
        'street',
        'distinct',
        'floor',
        'postal_code',
        'number',
        'city_id',
    ];
    protected $casts = [
        'floor' => 'integer',
        'number' => 'integer',
        'postal_code' => 'integer',
    ];

    /**
     * Get user as a one to many relationship.
     *
     * @return BelongsTo
     */
    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get city as a one to many relationship.
     *
     * @return BelongsTo
     */
    public function getCity()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    /**
     * Get orders that refers to this address.
     *
     * @return HasMany
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, 'address_id');
    }
}
