<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\City;
use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Contracts\ShoppingCartRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use function Sodium\add;

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
     */
    public function show(Order $order)
    {
        $order = $this->orderRepository->customerShow($order);
        if ($order) {
            return view('site.pages.order.show', compact('order'));
        }
        return redirect()->back();
    }

    public function checkoutForm()
    {
        $address = Address::where('user_id', Auth::id())
            ->with('getCity')
            ->first();
        $shopping_cart = $this->shoppingCartRepository->findByAuthId();
        $total_price = (float)0;
        foreach ($shopping_cart->getCartItem as $cart_item) {
            $total_price += $cart_item->total_price;
        }
        $cities = City::orderBy('id')->get();
        return view('site.pages.order.checkout')
            ->with(compact('address'))
            ->with(compact('shopping_cart'))
            ->with(compact('total_price'))
            ->with(compact('cities'));
    }

    /**
     * Create order object from shopping cart.
     *
     * @return RedirectResponse
     */
    public function checkout()
    {
        $order = $this->orderRepository->checkout();
        return redirect()->route('order.show', ['order' => $order->id]);
    }
}
