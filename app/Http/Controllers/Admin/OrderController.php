<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\View\View;

class OrderController extends Controller implements OrderControllerInterface
{
    /**
     * Display a listing of the orders.
     *
     * @return View
     */
    public function index()
    {
        $order = Order::orderBy('updated_at', 'desc')
            ->with('getUser')
            ->paginate(5);
        return view('admin.orders.index', compact('order'));
    }

    /**
     * Display the new specified order.
     *
     * @param Order $order
     * @return View
     */
    public function show(Order $order)
    {
        $order->load(['getUser', 'getOrderItem']);
        return view('admin.orders.show', compact('order'));
    }
}
