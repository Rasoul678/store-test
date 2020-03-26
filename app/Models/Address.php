<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'created_at',
        'updated_at',
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
}
