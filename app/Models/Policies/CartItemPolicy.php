<?php

namespace App\Models\Policies;

use App\Models\CartItem;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CartItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any cart items.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the cart item.
     *
     * @param User $user
     * @param CartItem $cartItem
     * @return mixed
     */
    public function view(User $user, CartItem $cartItem)
    {
        //
    }

    /**
     * Determine whether the user can create cart items.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('add cart item')
            ? Response::allow()
            : Response::deny('You don\'t have required permission to add product to your cart.');
    }

    /**
     * Determine whether the user can update the cart item.
     *
     * @param User $user
     * @param CartItem $cartItem
     * @return mixed
     */
    public function update(User $user, CartItem $cartItem)
    {
        return $user->can('edit cart item')
            ? Response::allow()
            : Response::deny('You don\'t have required permission to edit your cart item.');
    }

    /**
     * Determine whether the user can delete the cart item.
     *
     * @param User $user
     * @param CartItem $cartItem
     * @return mixed
     */
    public function delete(User $user, CartItem $cartItem)
    {
        return $user->can('delete cart item')
            ? Response::allow()
            : Response::deny('You don\'t have required permission to delete your cart item.');
    }

    /**
     * Determine whether the user can restore the cart item.
     *
     * @param User $user
     * @param CartItem $cartItem
     * @return mixed
     */
    public function restore(User $user, CartItem $cartItem)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the cart item.
     *
     * @param User $user
     * @param CartItem $cartItem
     * @return mixed
     */
    public function forceDelete(User $user, CartItem $cartItem)
    {
        //
    }
}
