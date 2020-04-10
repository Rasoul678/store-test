<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\CartItem;
use App\Models\City;
use App\Models\Product;
use App\Repositories\Contracts\ShoppingCartRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CartController extends Controller implements CartControllerInterface
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
     * Display shopping cart and its cart items.
     *
     * @return View
     */
    public function index()
    {
        if (!Auth::check()) {
            $carts = $this->sessionIndex();
        }
        $shopping_cart = $this->shoppingCartRepository->all();
        $total_price = (float)0;
        foreach ($shopping_cart->getCartItem as $cart_item) {
            $total_price += $cart_item->total_price;
        }
        return view('site.pages.shopping_cart.show')
            ->with(compact('shopping_cart'))
            ->with(compact('total_price'));
    }

    public function sessionIndex()
    {
        $carts = $this->shoppingCartRepository->sessionIndex();
        return view('site.pages.shopping_cart.session', compact('carts'));
    }

    /**
     * Add cart item to the specified shopping cart.
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function add(Product $product)
    {
        if (Auth::check()) {
            $this->shoppingCartRepository->addCartItem($product);
        } else {
            $data = session('cartItem');
            if (is_null($data)) {
                $data = [$product->name => ['id' => $product->id, 'quantity' => 1, 'price' => $product->price]];
                session()->put('cartItem', $data);
            } else {
                $state = true;
                foreach ($data as $key => $value) {
                    if ($product->id == $key && $state) {
                        $newData = session()->pull('cartItem');
                        $newData[$key]['quantity'] += 1;
                        session()->put('cartItem', $newData);
                        $state = false;
                    }
                }
                if ($state) {
                    $newData = session()->pull('cartItem');
                    $data = [$product->name => ['id' => $product->id, 'quantity' => 1, 'price' => $product->price]];
                    session()->put('cartItem', array_merge($newData, $data));
                }
            }
        }
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

    public function removeSessionCart($cart)
    {
        if (!Auth::check()) {
            session()->forget('cartItem.' . $cart);
        }
        return redirect()->back();
    }

    public function checkoutForm()
    {
        if (!Auth::check()) {
            return $this->sessionIndex();
        }
        $address = Address::where('user_id', Auth::id())
            ->orderBy('updated_at')
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
}
