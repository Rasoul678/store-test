<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

interface CartControllerInterface
{
    /**
     * Display shopping cart and its cart items.
     *
     * @return View
     */
    public function index();

    /**
     * Add cart item to the specified shopping cart.
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function add(Product $product);

    /**
     * Remove a cart item from shopping cart.
     *
     * @param CartItem $cartItem
     * @return RedirectResponse
     * @throws \Exception
     */
    public function remove(CartItem $cartItem);
}
