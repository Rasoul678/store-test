<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
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
        return view('site.pages.profile.show', compact('user'));
    }

    /**
     * Display edit form for updating basic information of the authenticated user.
     *
     * @return View
     */
    public function edit()
    {
        $user = Auth::user();
        return view('site.pages.profile.edit', compact('user'));
    }

    /**
     * Update basic information of the authenticated user.
     *
     * @return RedirectResponse
     */
    public function update()
    {
        $user = Auth::user();
        $data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
        $user->update($data);
        $user->save();
        flash('Your basic information has been updated successfully.');
        return redirect()->route('profile.show');
    }
}
