<?php

namespace App\Repositories\Contracts;


use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

interface OrderRepositoryInterface
{
    /**
     * Return collection of all orders belongs to an authenticated user.
     *
     * @return Collection
     */
    public function customerIndex(): Collection;

    /**
     * Check if order belonging and return the specified order detail.
     *
     * @param Order $order
     * @return Order
     */
    public function customerShow(Order $order): Order;

    /**
     * Generate order and all of order items from shopping cart and return the order.
     *
     * @return Order
     */
    public function checkout(): Order;
}
