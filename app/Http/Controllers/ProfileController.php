<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the specified user profile.
     *
     * @return View
     */
    public function show()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }
}
