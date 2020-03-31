<?php

namespace App\Repositories\Contracts;

use App\Models\Product;
use App\Models\ShoppingCart;

interface ShoppingCartRepositoryInterface
{
    /**
     * Get shopping cart and all of its cart items.
     *
     * @return ShoppingCart
     */
    public function all(): ShoppingCart;

    /**
     * Add cart items to shopping cart.
     *
     * @param Product $product
     * @param int $quantity
     */
    public function addCartItem(Product $product, $quantity = 1);

    /**
     * Find shopping cart of an authenticated user.
     *
     * @return ShoppingCart
     */
    public function findByAuthId(): ShoppingCart;
}
