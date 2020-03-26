<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller implements ProductControllerInterface
{
    /**
     * Display a listing of the products.
     *
     * @return View
     */
    public function index()
    {
        $products = Product::orderBy('updated_at', 'asc')->get();
        return view('product.index', compact('products'));
    }

    /**
     * Display the specified product.
     *
     * @param Product $product
     * @return View
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }
}
