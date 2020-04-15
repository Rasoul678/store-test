<?php

namespace App\Repositories\Contracts;

use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Cookie\CookieJar;
use Symfony\Component\HttpFoundation\Cookie;

interface ShoppingCartRepositoryInterface
{
    /**
     * Get shopping cart and all of its cart items.
     *
     * @return ShoppingCart
     */
    public function all(): ShoppingCart;

    /**
     * Get cart data from cookie as an associative array.
     *
     * @return CookieJar|Cookie
     */
    public function guestIndex();

    /**
     * Add cart items to shopping cart.
     *
     * @param Product $product
     * @param int $quantity
     * @param ShoppingCart|null $shopping_cart
     */
    public function addCartItem(Product $product, $quantity = null, $shopping_cart = null);

    /**
     * Add guest user cart item.
     *
     * @param Product $product
     */
    public function addGuestCartItem(Product $product);

    /**
     * Remove guest cart item.
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
     * registered user and add guest cart items to it.
     *
     * @param $event
     */
    public function handleShoppingCart($event);
}
