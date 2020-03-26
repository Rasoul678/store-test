<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface CategoryInterface
{
    /**
     * Get the route key for the model.
     * It is needed for slug urls.
     *
     * @return string
     */
    public function getRouteKeyName();

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable();

    /**
     * Get products as a many to many relationship.
     *
     * @return BelongsToMany
     */
    public function getProducts();
}
