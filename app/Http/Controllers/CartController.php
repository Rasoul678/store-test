<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\Product;
use App\Models\ShoppingCart;

class CartController extends Controller
{
    public function index(ShoppingCart $shopping_cart)
    {
        $cart = ShoppingCart::where('customer_id', 1)->first();//TODO: Change customer_id
        if ($cart) {
            $shopping_cart = $cart;
        }
        return view('shopping_cart.show', compact('shopping_cart'));
    }

    public function add(Product $product, ShoppingCart $shopping_cart)
    {
        ShoppingCart::addItem($product, $shopping_cart);
        flash($product->name . ' has been added to cart.');
        return redirect()->back();
    }

    public function remove(CartItem $cartItem)
    {
        $cartItem->delete();
        return redirect()->back();
    }

    public function checkout()
    {
        $order = Order::checkout();
        return $this->indexOrder($order);
    }

    public function indexOrder(Order $order)
    {
        return view('order.index', compact('order'));
    }
}
