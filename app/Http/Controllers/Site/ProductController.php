<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller implements ProductControllerInterface
{
    
    /**
     * Display the specified product.
     *
     * @param Product $product
     * @return View
     */
    public function show(Product $product)
    {
        $product->load('getCategories');
        return view('site.pages.product.show', compact('product'));
    }
}
