<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

interface ShoppingCartInterface
{
    /**
     * Get customer as a one to many relationship.
     *
     * @return BelongsTo
     */
    public function getCustomer();

    /**
     * Get cart items as a many to one relationship.
     *
     * @return HasMany
     */
    public function getCartItem();
}
