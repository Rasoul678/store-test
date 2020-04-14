<?php


namespace App\Repositories;


use App\Models\CartItem;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Repositories\Contracts\ShoppingCartRepositoryInterface;
use Illuminate\Cookie\CookieJar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class ShoppingCartRepository implements ShoppingCartRepositoryInterface
{
    /**
     * Get shopping cart and all of its cart items.
     *
     * @return ShoppingCart
     */
    public function all(): ShoppingCart
    {
        return $this->findByAuthId();
    }

    /**
     * Get cart items of a guest from cookie.
     *
     * @return CookieJar|\Symfony\Component\HttpFoundation\Cookie
     */
    public function cookieIndex()
    {
        return json_decode(Cookie::get('cartItem'),true);
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
            $shopping_cart = $this->findOrCreate(Auth::id())
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
     * Add product to cookie.
     *
     * @param Product $product
     */
    public function addGuestCartItem(Product $product)
    {
        $data = json_decode(Cookie::get('cartItem'),true);
        if (is_null($data)) {
            $data = [$product->name => ['id' => $product->id, 'quantity' => 1, 'price' => $product->price]];
            Cookie::queue(Cookie('cartItem',json_encode($data)));
        } else {
            $state = true;
            foreach ($data as $key => $value) {
                if ($product->name == $key && $state) {
                    $data[$key]['quantity'] += 1;
                    Cookie::queue(Cookie('cartItem',json_encode($data)));
                    $state = false;
                }
            }
            if ($state) {
                $newData = json_decode(Cookie::get('cartItem'),true);
                $data = [$product->name => ['id' => $product->id, 'quantity' => 1, 'price' => $product->price]];
                Cookie::queue(Cookie('cartItem',json_encode(array_merge($newData, $data))));
            }
        }
    }

    /**
     * Remove guest cart item from cookie.
     *
     * @param $cart
     */
    public function removeGuestCart($cart)
    {
        $data = json_decode(Cookie::get('cartItem'), true);
        foreach ($data as $key => $item) {
            if ($key == $cart) {
                unset($data[$key]);
                Cookie::queue(Cookie('cartItem', json_encode($data)));
                break;
            }
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
     * Handle creating/finding shopping cart for the logged in or
     * registered user and add cart items to it from cookie.
     *
     * @param $event
     */
    public function handleShoppingCart($event)
    {
        $shopping_cart = $this->findOrCreate($event->user->id);
        if (Cookie::get('cartItem')) {
            $data=json_decode(Cookie::get('cartItem'),true);
            foreach ($data as $key => $value) {
                $product = Product::where('id',$data[$key]['id'])->first();
                $quantity = $data[$key]['quantity'];
                $this->addCartItem($product, $quantity, $shopping_cart);
            }
            Cookie::queue(Cookie::forget('cartItem'));
        }
    }

    /**
     * Find shopping cart object of the authenticated user or create an object.
     *
     * @param $id
     * @return ShoppingCart
     */
    public function findOrCreate($id): ShoppingCart
    {
        return ShoppingCart::firstOrCreate(['customer_id' => $id]);
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
