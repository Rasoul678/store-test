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
         * @return \Illuminate\Contracts\View\Factory|RedirectResponse|View
         */
        public function showLoginForm()
        {
            if(Auth::guard('web')->check()){
                return redirect()->route('home')->with('logoutAsUser','For accessing admin panel, You have to log out from current user first!');
            }
            return view('admin.auth.login');
        }
    
    
        /**
         * @param Request $request
         * @return \Illuminate\Contracts\View\Factory|RedirectResponse|View
         * @throws ValidationException
         */
        public function login(Request $request)
        {
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
