<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrderController extends Controller implements OrderControllerInterface
{
    /**
     * Display orders of a specific user.
     *
     * @return View
     */
    public function index()
    {
        $order = Order::where('customer_id', Auth::id())->orderBy('updated_at', 'desc')->get();
        return view('order.index', compact('order'));
    }

    /**
     * Show a specific order of a specific user.
     *
     * @param Order $order
     * @return RedirectResponse|View
     */
    public function show(Order $order)
    {
        if ($order->customer_id == Auth::id()) {
            return view('order.show', compact('order'));
        }
        return redirect()->back();
    }

    /**
     * Create order object from shopping cart.
     *
     * @return RedirectResponse
     */
    public function checkout()
    {
        $order = Order::checkout();
        return redirect()->route('order.show', ['order' => $order->id]);
    }
}
