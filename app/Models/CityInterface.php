<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface CityInterface
{
    /**
     * Get addresses as a many to one relationship.
     *
     * @return HasMany
     */
    public function getAddresses();
}
