<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
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
            $users = User::role('Admin')->orderBy('updated_at', 'desc')
                ->get();
        } elseif (request()->has('customers')) {
            $users = User::role('Customer')->orderBy('updated_at', 'desc')
                ->get();
        } else {
            $users = User::orderBy('updated_at', 'desc')
                ->get();
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
     */
    public function edit(User $user)
    {
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
     */
    public function update(User $user)
    {
        $role_data = request()->validate([
            'roles.*' => 'required'
        ]);
        $user->syncRoles($role_data['roles']);
        $user_data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
        $user->update($user_data);
        $user->save();
        flash($user->getFullNameAttribute() . ' has been updated successfully.');
        return redirect()->route('admin.users.show', compact('user'));
    }
}
