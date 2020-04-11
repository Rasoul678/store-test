<?php

namespace App\Http\Controllers\Site;

use App\Models\Product;
use Illuminate\View\View;

interface ProductControllerInterface
{
    
    /**
     * Display the specified product.
     *
     * @param Product $product
     * @return View
     */
    public function show(Product $product);
}
