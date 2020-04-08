<?php

namespace App\Models;

use App\Models\Enums\OrderStatus;
use BenSampo\Enum\Traits\CastsEnums;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Order extends Model implements OrderInterface
{
    use SoftDeletes;
    use CastsEnums;

    /**
     * Specify the name of the database table.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'total_price',
        'status',
    ];

    /**
     * The attributes that have in date format.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $enumCasts = [
        'status' => OrderStatus::class,
    ];

    protected $casts = [
        'status' => 'int',
    ];

    /**
     * Get users as a one to many relationship.
     *
     * @return BelongsTo
     */
    public function getUser()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    /**
     * Get order items as a many to one relationship.
     *
     * @return HasMany
     */
    public function getOrderItem()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    /**
     * Calculate total price of a order by aggregating total prices of every order item.
     *
     * @param Order $order
     * @return float
     */
    static private function totalPrice(Order $order)
    {
        $aggregate = (float)0;
        foreach ($order->getOrderItem as $orderItem) {
            $aggregate += $orderItem->total_price;
        }
        return $aggregate;
    }

    /**
     * Add order items to a order.
     *
     * @param CartItem $cartItem
     * @param Order $order
     * @return OrderItem
     */
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
//TODO:Delete these lines

//    /**
//     * Create order object from a shopping cart item.
//     *
//     * @return mixed
//     */
//    static public function checkout()
//    {
//        $shopping_cart = ShoppingCart::where('customer_id', 1)->first();
//        $order = Order::create([
//            'customer_id' => Auth::id(),
//            'total_price' => 0,
//        ]);
//        foreach ($shopping_cart->getCartItem as $cartItem) {
//            self::addItem($cartItem, $order);
//        }
//        $order->total_price = self::totalPrice($order);
//        $order->save();
//        $shopping_cart->delete();
//        return $order;
//    }
}
