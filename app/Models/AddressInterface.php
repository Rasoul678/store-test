<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

interface AddressInterface
{
    /**
     * Get user as a one to many relationship.
     *
     * @return BelongsTo
     */
    public function getUser();

    /**
     * Get city as a one to many relationship.
     *
     * @return BelongsTo
     */
    public function getCity();

    /**
     * Get orders that refers to this address.
     *
     * @return HasMany
     */
    public function getOrders();
}
