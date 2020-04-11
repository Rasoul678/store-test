<?php

namespace App\Listeners;

use App\Repositories\Contracts\ShoppingCartRepositoryInterface;
use Illuminate\Auth\Events\Login;

class LogSuccessfulLogin
{
    /**
     * @var ShoppingCartRepositoryInterface
     */
    private $shoppingCartRepository;

    /**
     * Create the event listener.
     *
     * @param ShoppingCartRepositoryInterface $shoppingCartRepository
     */
    public function __construct(ShoppingCartRepositoryInterface $shoppingCartRepository)
    {
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
        $this->shoppingCartRepository->handleShoppingCart($event);
    }
}
