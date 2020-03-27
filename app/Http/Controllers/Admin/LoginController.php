<?php

    namespace App\Http\Controllers\Admin;

    use Auth;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Validation\ValidationException;
    use Illuminate\View\View;

    class LoginController extends Controller implements LoginControllerInterface
    {
        /**
         * Where to redirect admins after login.
         *
         * @var string
         */
        protected $redirectTo = '/admin';

        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('guest:admin')->except('logout');
        }

        /**
         * Display a form for login users.
         *
         * @return View
         */
        public function showLoginForm()
        {
            return view('admin.auth.login');
        }

        /**
         * Login the user.
         *
         * @param Request $request
         * @return RedirectResponse
         * @throws ValidationException
         */
        public function login(Request $request)
        {
            Auth::guard('web')->logout();
            $this->validate($request, [
                'email'   => 'required|email',
                'password' => 'required|min:6'
            ]);

            if (Auth::guard('admin')->attempt([
                'email' => $request->email,
                'password' => $request->password
            ], $request->get('remember'))) {
                return redirect()->intended(route('admin.dashboard'));
            }
            return back()->withInput($request->only('email', 'remember'));
        }

        /**
         * Logout the admin.
         *
         * @param Request $request
         * @return RedirectResponse
         */
        public function logout(Request $request)
        {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login')->with('logout-msg', 'You have to log in as admin again to see dashboard, If you want to!');
        }
    }
