<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\Product;
use App\Models\ShoppingCart;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::orderBy('updated_at', 'desc')->get();
        return view('admin.orders.index', compact('order'));
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    public function checkout()
    {
        $order = Order::checkout();
        return redirect()->route('order.show', ['order' => $order->id]);
    }
}
