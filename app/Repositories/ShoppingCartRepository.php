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
     * Get cart data from cookie as an associative array.
     *
     * @return array|CookieJar|\Symfony\Component\HttpFoundation\Cookie
     */
    public function guestIndex()
    {
        return json_decode(Cookie::get('cartItem'), true) ?? [];
    }

    /**
     * Write cart data to cookie in json format.
     *
     * @param $cart
     */
    private function addGuestData($cart)
    {
        Cookie::queue(Cookie('cartItem', json_encode($cart)));
    }

    /**
     * Clear cookie from cart data.
     */
    private function clearCookie()
    {
        Cookie::queue(Cookie::forget('cartItem'));
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
     * Add guest user cart item.
     *
     * @param Product $product
     */
    public function addGuestCartItem(Product $product)
    {
        $cart = $this->guestIndex();
        if (is_null($cart)) {
            $cart = $this->guestData($product);
            $cart['total_price'] = $this->totalGuestCartPrice($cart);
            $this->addGuestData($cart);
        } else {
            $state = true;
            foreach ($cart as $key => $value) {
                if ($product->name == $key && $state) {
                    $cart[$key]['quantity'] += 1;
                    $cart['total_price'] = $this->totalGuestCartPrice($cart);
                    $this->addGuestData($cart);
                    $state = false;
                    break;
                }
            }
            if ($state) {
                $newCart = $this->guestData($product);
                $result = array_merge($newCart, $cart);
                $result['total_price'] = $this->totalGuestCartPrice($result);
                $this->addGuestData($result);
            }
        }
    }

    /**
     * Remove guest cart item.
     *
     * @param $cartItem
     */
    public function removeGuestCart($cartItem)
    {
        $cart = $this->guestIndex();
        foreach ($cart as $key => $item) {
            if ($key == $cartItem) {
                unset($cart[$key]);
                $total_price = $this->totalGuestCartPrice($cart);
                if ($total_price != 0) {
                    $cart['total_price'] = $total_price;
                } else {
                    unset($cart['total_price']);
                }
                $this->addGuestData($cart);
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
     * registered user and add guest cart items to it.
     *
     * @param $event
     */
    public function handleShoppingCart($event)
    {
        $shopping_cart = $this->findOrCreate($event->user->id);
        if (count($this->guestIndex()) != 0) {
            if (!$event->user->can('add cart item')) {
                abort(403,
                    'You don\'t have required permission to add cart item, at first remove your cart items then login.');
            }
            $cart = $this->guestIndex();
            unset($cart['total_price']);
            foreach ($cart as $key => $value) {
                $product = Product::where('id', $cart[$key]['id'])->first();
                $quantity = $cart[$key]['quantity'];
                $this->addCartItem($product, $quantity, $shopping_cart);
            }
            $this->clearCookie();
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

    /**
     * Multiply the quantity and the price of all products in guest cart..
     *
     * @param $cart
     * @return float|int
     */
    private function totalGuestCartPrice($cart)
    {
        $sum = 0;
        foreach ($cart as $key => $value) {
            if (isset($cart[$key]['quantity']) && isset($cart[$key]['quantity'])) {
                $sum += $cart[$key]['quantity'] * $cart[$key]['price'];
            } else {
                $sum += 0;
            }
        }
        return $sum;
    }

    private function guestData($product)
    {
        return [
            $product->name => [
                'id' => $product->id,
                'quantity' => 1,
                'price' => $product->price,
            ],
            'total_price' => 0,
        ];
    }
}
