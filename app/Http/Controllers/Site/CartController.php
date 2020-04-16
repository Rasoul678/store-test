<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\CartItem;
use App\Models\City;
use App\Models\Product;
use App\Repositories\Contracts\ShoppingCartRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
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
            return $this->guestIndex();
        } else {
            return $this->checkoutForm();
        }
    }

    /**
     * Display carts of guest user.
     *
     * @return Application|Factory|View
     */
    public function guestIndex()
    {
        $carts = $this->shoppingCartRepository->guestIndex();
        if (!$carts) {
            flash('Your cart is empty at the moment.')->warning()->important();
        } else {
            flash('You need to log in or sign up to be able to checkout.')->error()->important();
        }
        return view('site.pages.shopping_cart.guest', compact('carts'));
    }

    /**
     * Add cart item to the specified shopping cart.
     *
     * @param Product $product
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function add(Product $product)
    {
        if (Auth::check()) {
            $this->authorize('create', CartItem::class);
            $this->shoppingCartRepository->addCartItem($product);
        } else {
            $this->shoppingCartRepository->addGuestCartItem($product);
        }
        flash($product->name . ' has been added to cart.');
        return redirect()->back();
    }

    /**
     * Remove a cart item from shopping cart.
     *
     * @param CartItem $cartItem
     * @return View
     * @throws AuthorizationException
     * @throws \Exception
     */
    public function remove(CartItem $cartItem)
    {
        $this->authorize('delete', $cartItem);
        $cart_name = $cartItem->getProduct->name;
        $cartItem->delete();
        flash($cart_name . ' has been successfully deleted from cart.');
        return $this->index();
    }

    /**
     * Remove product from cart of guest user.
     *
     * @param $cart
     * @return RedirectResponse
     */
    public function removeGuestCart($cart)
    {
        $cart_name = $cart;
        if (!Auth::check()) {
            $this->shoppingCartRepository->removeGuestCart($cart);
        }
        return redirect()->route('cart.index')
            ->with('flash', $cart_name . ' has been successfully deleted from cart.');
    }

    /**
     * Display checkout form and address of the user if available.
     *
     * @return Application|Factory|View
     */
    public function checkoutForm()
    {
        if (!Auth::check()) {
            return $this->guestIndex();
        }
        $address = Address::where('user_id', Auth::id())
            ->orderBy('updated_at','desc')
            ->with('getCity')
            ->first();
        $shopping_cart = $this->shoppingCartRepository->findByAuthId();
        $total_price = (float)0;
        foreach ($shopping_cart->getCartItem as $cart_item) {
            $total_price += $cart_item->total_price;
        }
        $cities = City::orderBy('id')->get();
        if (count($shopping_cart->getCartItem) == 0) {
            flash('Your cart is empty at the moment.')->warning()->important();
        }
        return view('site.pages.order.checkout')
            ->with(compact('address'))
            ->with(compact('shopping_cart'))
            ->with(compact('total_price'))
            ->with(compact('cities'));
    }
}
