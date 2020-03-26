<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
