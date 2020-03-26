<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

interface LoginControllerInterface
{
    /**
     * Display a form for login users.
     *
     * @return View
     */
    public function showLoginForm();

    /**
     * Login the user.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function login(Request $request);

    /**
     * Logout the user.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request);
}
