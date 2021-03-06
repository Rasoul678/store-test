<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\StoreOrder;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

interface OrderControllerInterface
{
    /**
     * Display orders of a specific user.
     *
     * @return View
     */
    public function index();

    /**
     * Show a specific order of a specific user.
     *
     * @param Order $order
     * @return RedirectResponse|View
     */
    public function show(Order $order);

    /**
     * Create order object from shopping cart.
     *
     * @param StoreOrder $request
     * @return RedirectResponse
     */
    public function checkout(StoreOrder $request);
}
