<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

interface ProductControllerInterface
{
    /**
     * Display a listing of the products.
     *
     * @return View
     */
    public function index();

    /**
     * Display the specified product.
     *
     * @param Product $product
     * @return View
     */
    public function show(Product $product);
}
