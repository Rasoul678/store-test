<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
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
            return view('site.pages.shopping_cart.session', compact('carts'));
        }
        $shopping_cart = $this->shoppingCartRepository->all();
        return view('site.pages.shopping_cart.show', compact('shopping_cart'));
    }

    public function sessionIndex()
    {
        return $this->shoppingCartRepository->sessionIndex();
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
            session()->push('cartItem.' . $product->name, $product->id);
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
}
