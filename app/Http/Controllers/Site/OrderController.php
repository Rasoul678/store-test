<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrder;
use App\Models\Address;
use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Contracts\ShoppingCartRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrderController extends Controller implements OrderControllerInterface
{
    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;
    /**
     * @var ShoppingCartRepositoryInterface
     */
    private $shoppingCartRepository;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        ShoppingCartRepositoryInterface $shoppingCartRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->shoppingCartRepository = $shoppingCartRepository;
    }

    /**
     * Display orders of a specific user.
     *
     * @return View
     */
    public function index()
    {
        $order = $this->orderRepository->customerIndex();
        return view('site.pages.order.index', compact('order'));
    }

    /**
     * Show a specific order of a specific user.
     *
     * @param Order $order
     * @return RedirectResponse|View
     * @throws AuthorizationException
     */
    public function show(Order $order)
    {
        $this->authorize('view', $order);
        $order = $this->orderRepository->customerShow($order);
        if ($order) {
            return view('site.pages.order.show', compact('order'));
        }
        return redirect()->back();
    }


    /**
     * Create order object from shopping cart.
     *
     * @param StoreOrder $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function checkout(StoreOrder $request)
    {
        $this->authorize('create', Order::class);
        $address = Address::firstOrNew($request->validated());
        $address->user_id = Auth::id();
        $address->save();
        $order = $this->orderRepository->checkout($address);
        flash('Order has been successfully submitted.');
        return redirect()->route('order.show', ['order' => $order->id]);
    }
}
