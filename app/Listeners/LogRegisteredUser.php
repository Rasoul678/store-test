<?php

namespace App\Listeners;

use App\Repositories\Contracts\ShoppingCartRepositoryInterface;
use Illuminate\Auth\Events\Registered;

class LogRegisteredUser
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
     * @param Registered $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $this->shoppingCartRepository->findOrCreate($event->user->id);
    }
}
