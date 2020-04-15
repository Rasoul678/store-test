<?php

namespace App\Http\Controllers\Site;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
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
     * Display carts of guest user.
     *
     * @return Application|Factory|View
     */
    public function guestIndex();

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

    /**
     * Remove product from cart of guest user.
     *
     * @param $cart
     * @return RedirectResponse
     */
    public function removeGuestCart($cart);

    /**
     * Display checkout form and address of the user if available.
     *
     * @return Application|Factory|View
     */
    public function checkoutForm();
}
