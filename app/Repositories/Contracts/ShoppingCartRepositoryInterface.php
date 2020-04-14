<?php

namespace App\Repositories\Contracts;

use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\View;

interface ShoppingCartRepositoryInterface
{
    /**
     * Get shopping cart and all of its cart items.
     *
     * @return ShoppingCart
     */
    public function all(): ShoppingCart;

    /**
     * Get cart items of a guest from session.
     *
     * @return View
     */
    public function cookieIndex();

    /**
     * Add cart items to shopping cart for guest.
     *
     * @param Product $product
     * @param int $quantity
     * @param ShoppingCart|null $shopping_cart
     */
    public function addCartItem(Product $product, $quantity = null, $shopping_cart = null);

    /**
     * Add product to cookie.
     *
     * @param Product $product
     */
    public function addGuestCartItem(Product $product);

    /**
     * Remove guest cart item from cookie.
     *
     * @param $cart
     */
    public function removeGuestCart($cart);

    /**
     * Find shopping cart of an authenticated user.
     *
     * @return ShoppingCart
     */
    public function findByAuthId(): ShoppingCart;

    /**
     * Find shopping cart object of the authenticated user or create an object.
     *
     * @param $id
     * @return ShoppingCart
     */
    public function findOrCreate($id): ShoppingCart;

    /**
     * Handle creating/finding shopping cart for the logged in or
     * registered user and add cart items to it from session.
     *
     * @param $event
     */
    public function handleShoppingCart($event);
}
