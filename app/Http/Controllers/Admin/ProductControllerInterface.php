<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
     * Show the form for creating a new product.
     *
     * @return View
     */
    public function create();

    /**
     * Store a newly created product in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request);

    /**
     * Display the new specified product.
     *
     * @param Product $product
     * @return View
     */
    public function show(Product $product);

    /**
     * Display a form for editing the specified product.
     *
     * @param Product $product
     * @return View
     */
    public function edit(Product $product);

    /**
     * Store the updated information of the specified product.
     *
     * @param Request $request
     * @param Product $product
     * @return View
     */
    public function update(Request $request, Product $product);

    /**
     * Soft delete (move to trash) the specified product.
     *
     * @param Product $product
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Product $product);

    /**
     * Force delete (permanently delete) the specified product.
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function forceDestroy(Product $product);
}
