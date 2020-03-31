<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface CartItemInterface
{
    /**
     * Get product of an item as a one to many relationship.
     *
     * @return BelongsTo
     */
    public function getProduct();

    /**
     * Get shopping cart of an item as a one to many realationship.
     *
     * @return BelongsTo
     *//**/
    public function getShoppingCart();
}
