<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

interface ProductInterface
{
    /**
     * Get order items as a many to one relationship.
     *
     * @return HasMany
     */
    public function getOrderItems();

    /**
     * Get categories as a many to many relationship.
     *
     * @return BelongsToMany
     */
    public function getCategories();
}
