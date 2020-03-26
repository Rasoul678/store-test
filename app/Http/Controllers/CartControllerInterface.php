<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

interface CartControllerInterface
{
    /**
     * Display shopping cart and its cart items.
     *
     * @param ShoppingCart $shopping_cart
     * @return View
     */
    public function index(ShoppingCart $shopping_cart);

    /**
     * Add cart item to the specified shopping cart.
     *
     * @param Product $product
     * @param ShoppingCart $shopping_cart
     * @return RedirectResponse
     */
    public function add(Product $product, ShoppingCart $shopping_cart);

    /**
     * Remove a cart item from shopping cart.
     *
     * @param CartItem $cartItem
     * @return RedirectResponse
     * @throws \Exception
     */
    public function remove(CartItem $cartItem);
}
