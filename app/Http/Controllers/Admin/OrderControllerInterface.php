<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
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
     * Update status of order.
     *
     * @param Order $order
     * @return View
     */
    public function update(Order $order);
}
