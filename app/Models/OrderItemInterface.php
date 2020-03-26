<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface OrderItemInterface
{
    /**
     * Get product as a one to many relationship.
     *
     * @return BelongsTo
     */
    public function getProduct();

    /**
     * Get order as a one to many relationship.
     *
     * @return BelongsTo
     */
    public function getOrder();
}
