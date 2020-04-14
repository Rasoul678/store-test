<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShoppingCart;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UserController extends Controller implements UserControllerInterface
{
    /**
     * Display a listing of the users.
     *
     * @return View
     */
    public function index()
    {
        if (request()->has('admins')) {
            $users = User::permission('admin')->orderBy('updated_at', 'desc')
                ->paginate(7);
        } elseif (request()->has('customers')) {
            $users = User::role('Customer')->orderBy('updated_at', 'desc')
                ->paginate(7);
        } else {
            $users = User::orderBy('updated_at', 'desc')
                ->paginate(7);
        }
        return view('admin.users.index', compact('users'));
    }

    /**
     * Display the specified user.
     *
     * @param User $user
     * @return View
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Display user edit form.
     *
     * @param User $user
     * @return View
     * @throws AuthorizationException
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $role = Role::all();
        return view('admin.users.edit')
            ->with(compact('user'))
            ->with(compact('role'));
    }

    /**
     * Update user role, first and last name.
     *
     * @param User $user
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(User $user)
    {
        $this->authorize('update', $user);
        $role = request()->validate([
            'role' => 'required'
        ]);
        $user->syncRoles($role);

        $user_data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
        $user->update($user_data);
        $user->save();
        flash('User: ' . $user->getFullNameAttribute() . ' has been updated successfully.');
        return redirect()->route('admin.users.show', compact('user'));
    }

    public function showCartItems(User $user)
    {
        $cart_items = ShoppingCart::where('customer_id', $user->id)
            ->firstOrFail()
            ->getCartItem()
            ->paginate(10);
        return view('admin.users.cartIndex')
            ->with(compact('user'))
            ->with(compact('cart_items'));
    }
}
