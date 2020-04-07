<?php

namespace App\Listeners;

use App\Models\Product;
use App\Models\ShoppingCart;
use App\Repositories\ShoppingCartRepository;
use Illuminate\Auth\Events\Login;

class LogSuccessfulLogin
{
    /**
     * @var ShoppingCartRepository
     */
    private $shoppingCartRepository;

    /**
     * Create the event listener.
     *
     * @param ShoppingCartRepository $shoppingCartRepository
     */
    public function __construct(ShoppingCartRepository $shoppingCartRepository)
    {
        //
        $this->shoppingCartRepository = $shoppingCartRepository;
    }

    /**
     * Handle the event.
     *
     * @param Login $event
     * @return void
     */
    public function handle(Login $event)
    {
        $shopping_cart = ShoppingCart::where('customer_id', $event->user->id)->first();
        if (session()->has('cartItem')) {
            foreach (session()->get('cartItem') as $key => $cart) {
                $quantity = (int)count($cart);
                $product = Product::where('id', array_pop($cart))->first();
                $this->shoppingCartRepository->addCartItem($product, $quantity, $shopping_cart);
            }
        }
    }
}
