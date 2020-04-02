<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

interface UserControllerInterface
{
    /**
     * Display a listing of the users.
     *
     * @return View
     */
    public function index();

    /**
     * Display the specified user.
     *
     * @param User $user
     * @return View
     */
    public function show(User $user);

    /**
     * Display user edit form.
     *
     * @param User $user
     * @return View
     */
    public function edit(User $user);

    /**
     * Update user role, first and last name.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function update(User $user);
}
