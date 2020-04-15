<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enums\OrderStatus;
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
            ->paginate(9);
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
        $status = OrderStatus::toSelectArray();
        return view('admin.orders.show')
            ->with(compact('order'))
            ->with(compact('status'));
    }

    /**
     * Update status of order.
     *
     * @param Order $order
     * @return View
     */
    public function update(Order $order)
    {
        $data = request()->validate([
            'status' => 'required',
        ]);
        $order->status = $data['status'];
        $order->save();
        flash('Order: ' . $order->id . ' has been updated successfully.');
        return $this->index();
    }
}
