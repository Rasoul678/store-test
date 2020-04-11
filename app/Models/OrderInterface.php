<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

interface OrderInterface
{
    /**
     * Get users as a one to many relationship.
     *
     * @return BelongsTo
     */
    public function getUser();

    /**
     * Get order items as a many to one relationship.
     *
     * @return HasMany
     */
    public function getOrderItem();

    /**
     * Get address of the specified order.
     *
     * @return BelongsTo
     */
    public function getAddress();
}
