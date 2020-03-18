<?php

namespace App\Models;

interface CategoryInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getProducts();
}
