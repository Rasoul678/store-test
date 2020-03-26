<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

interface OrderControllerInterface
{
    /**
     * Display a listing of the orders.
     *
     * @return View
     */
    public function index();

    /**
     * Display the new specified order.
     *
     * @param Order $order
     * @return View
     */
    public function show(Order $order);

    /**
     * Create order object from shopping cart.
     *
     * @return RedirectResponse
     */
    public function checkout();
}
