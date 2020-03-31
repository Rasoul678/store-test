<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrderController extends Controller implements OrderControllerInterface
{
    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Display orders of a specific user.
     *
     * @return View
     */
    public function index()
    {
        $order = $this->orderRepository->customerIndex();
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
        $order = $this->orderRepository->customerShow($order);
        if ($order) {
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
        $order = $this->orderRepository->checkout();
//        $order = Order::checkout();
        return redirect()->route('order.show', ['order' => $order->id]);
    }
}
