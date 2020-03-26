<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CartController extends Controller implements CartControllerInterface
{
    /**
     * Display shopping cart and its cart items.
     *
     * @param ShoppingCart $shopping_cart
     * @return View
     */
    public function index(ShoppingCart $shopping_cart)
    {
        $cart = ShoppingCart::where('customer_id', Auth::id())->first();
        if ($cart) {
            $shopping_cart = $cart;
        }
        return view('shopping_cart.show', compact('shopping_cart'));
    }

    /**
     * Add cart item to the specified shopping cart.
     *
     * @param Product $product
     * @param ShoppingCart $shopping_cart
     * @return RedirectResponse
     */
    public function add(Product $product, ShoppingCart $shopping_cart)
    {
        ShoppingCart::addItem($product, $shopping_cart);
        flash($product->name . ' has been added to cart.');
        return redirect()->back();
    }

    /**
     * Remove a cart item from shopping cart.
     *
     * @param CartItem $cartItem
     * @return RedirectResponse
     * @throws \Exception
     */
    public function remove(CartItem $cartItem)
    {
        $cartItem->delete();
        return redirect()->back();
    }
}
