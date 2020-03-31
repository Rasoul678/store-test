<?php


namespace App\Repositories;


use App\Models\Order;
use App\Models\OrderItem;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Contracts\ShoppingCartRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class OrderRepository implements OrderRepositoryInterface
{
    /**
     * @var ShoppingCartRepositoryInterface
     */
    private $shoppingCartRepository;

    public function __construct(ShoppingCartRepositoryInterface $shoppingCartRepository)
    {
        $this->shoppingCartRepository = $shoppingCartRepository;
    }

    /**
     * Return collection of all orders belongs to an authenticated user.
     *
     * @return Collection
     */
    public function customerIndex(): Collection
    {
        return Order::where('customer_id', Auth::id())
            ->orderBy('updated_at', 'desc')
            ->get();
    }

    /**
     * Check if order belonging and return the specified order detail.
     *
     * @param Order $order
     * @return Order
     */
    public function customerShow(Order $order): Order
    {
        if ($order->customer_id == Auth::id()) {
            $order->load([
                'getOrderItem' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                }
            ]);
            return $order;
        }
        return null;
    }

    /**
     * Generate order and all of order items from shopping cart and return the order.
     *
     * @return Order
     */
    public function checkout(): Order
    {
        $shopping_cart = $this->shoppingCartRepository->findByAuthId();
        $order = Order::create([
            'customer_id' => Auth::id(),
            'total_price' => 0,
        ]);
        foreach ($shopping_cart->getCartItem as $cartItem) {
            $order_item = new OrderItem([
                'product_id' => $cartItem->getProduct->id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->price,
                'total_price' => $cartItem->total_price,
            ]);
            $order->getOrderItem()->save($order_item);
            $cartItem->active = false;
            $cartItem->save();
        }

        $order->total_price = $this->calcTotalOrderPrice($order->load('getOrderItem'));
        $order->save();
        return $order;
    }

    /**
     * Calculate total price of order items.
     *
     * @param $order
     * @return float
     */
    private function calcTotalOrderPrice($order)
    {
        $aggregate = (float)0;
        foreach ($order->getOrderItem as $orderItem) {
            $aggregate += $orderItem->total_price;
        }
        return $aggregate;
    }
}
