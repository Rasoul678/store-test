<?php


namespace App\Repositories;


use App\Models\CartItem;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Repositories\Contracts\ShoppingCartRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class ShoppingCartRepository implements ShoppingCartRepositoryInterface
{
    /**
     * Get shopping cart and all of its cart items.
     *
     * @return ShoppingCart
     */
    public function all(): ShoppingCart
    {
        return $this->findOrCreate()
            ->load([
                'getCartItem' => function ($query) {
                    $query->where('active', true);
                }
            ]);
    }

    /**
     * Get cart items of a guest from session.
     *
     * @return view
     */
    public function sessionIndex()
    {
        if (!session()->exists('cartItem')) {
            session(['cartItem' => null]);
        }
        return session()->get('cartItem');
    }

    /**
     * Add cart items to shopping cart.
     *
     * @param Product $product
     * @param int $quantity
     * @param ShoppingCart|null $shopping_cart
     */
    public function addCartItem(Product $product, $quantity = null, $shopping_cart = null)
    {
        if (is_null($quantity)) {
            $quantity = 1;
        }
        if (!$shopping_cart) {
            $shopping_cart = $this->findOrCreate()
                ->load('getCartItem');
        }
        $cart = CartItem::where([
            'shopping_cart_id' => $shopping_cart->id,
            'product_id' => $product->id,
            'active' => true,
        ])
            ->first();

        if (!$cart) {
            $cart = new CartItem([
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $product->price,
            ]);
            $cart->total_price = $this->totalCartPrice($cart);
            $shopping_cart->getCartItem()->save($cart);
        } else {
            $cart->increment('quantity', $quantity);
            $cart->total_price = $this->totalCartPrice($cart);
            $cart->save();
        }
    }

    /**
     * Find shopping cart of an authenticated user.
     *
     * @return ShoppingCart
     */
    public function findByAuthId(): ShoppingCart
    {
        return ShoppingCart::where('customer_id', Auth::id())
            ->with([
                'getCartItem' => function ($query) {
                    $query->where('active', true)->get();
                }
            ])
            ->firstOrFail();
    }

    /**
     * Find shopping cart object of the authenticated user or create an object.
     *
     * @return ShoppingCart
     */
    private function findOrCreate(): ShoppingCart
    {
        return ShoppingCart::firstOrCreate(['customer_id' => Auth::id()]);
    }

    /**
     * Multiply the quantity and the price of a product.
     *
     * @param $cart
     * @return float
     */
    private function totalCartPrice($cart): float
    {
        return $cart->quantity * $cart->price;
    }
}
