<?php

namespace App\Models\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any orders.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the order.
     *
     * @param User $user
     * @param Order $order
     * @return mixed
     */
    public function view(User $user, Order $order)
    {
        return $user->id === $order->getUser->id
            ? Response::allow()
            : Response::deny('You don\'t have any order with this id.');
    }

    /**
     * Determine whether the user can create orders.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('add order')
            ? Response::allow()
            : Response::deny('You don\'t have required permission to create an order.');
    }

    /**
     * Determine whether the user can update the order.
     *
     * @param User $user
     * @param Order $order
     * @return mixed
     */
    public function update(User $user, Order $order)
    {
        if ($user->can('edit order')) {
            return true;
        } elseif ($user->id === $order->customer_id) {
            return true;
        }
        return Response::deny('You don\'t have required permission to update order.');
    }

    /**
     * Determine whether the user can delete the order.
     *
     * @param User $user
     * @param Order $order
     * @return mixed
     */
    public function delete(User $user, Order $order)
    {
        return $user->can('delete order')
            ? Response::allow()
            : Response::deny('You don\'t have required permission to delete order.');
    }

    /**
     * Determine whether the user can restore the order.
     *
     * @param User $user
     * @param Order $order
     * @return mixed
     */
    public function restore(User $user, Order $order)
    {
        return $user->can('delete order')
            ? Response::allow()
            : Response::deny('You don\'t have required permission to restore order.');
    }

    /**
     * Determine whether the user can permanently delete the order.
     *
     * @param User $user
     * @param Order $order
     * @return mixed
     */
    public function forceDelete(User $user, Order $order)
    {
        return $user->can('delete order')
            ? Response::allow()
            : Response::deny('You don\'t have required permission to permanently delete order.');
    }
}
