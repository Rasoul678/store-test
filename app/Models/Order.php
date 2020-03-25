<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model implements OrderInterface
{
    use SoftDeletes;

    protected $table = 'orders';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'customer_id',
        'total_price',
        'order_status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function getOrderItem()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    static private function totalPrice(Order $order)
    {
        $aggregate = (float)0;
        foreach ($order->getOrderItem as $orderItem) {
            $aggregate += $orderItem->total_price;
        }
        return $aggregate;
    }

    static private function addItem(CartItem $cartItem, Order $order)
    {
        $order_item = new OrderItem([
            'product_id' => $cartItem->getProduct->id,
            'quantity' => $cartItem->quantity,
            'price' => $cartItem->price,
            'total_price' => $cartItem->total_price,
        ]);
        $order->getOrderItem()->save($order_item);
        return $order_item;
    }

    static public function checkout()
    {
        $shopping_cart = ShoppingCart::where('customer_id', 1)->first();
        $order = Order::create([
            'customer_id' => 1,//TODO: Add authenticated customer id
            'total_price' => 0,
        ]);
        foreach ($shopping_cart->getCartItem as $cartItem) {
            self::addItem($cartItem, $order);
        }
        $order->total_price = self::totalPrice($order);
        $order->save();
        $shopping_cart->delete();
        return $order;
    }
}
