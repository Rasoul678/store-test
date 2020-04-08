<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeDashboard();
        $this->composeAdminSidebar();
        $this->composeAdminHeader();
        $this->composeSiteNav();
    }

    /**
     *  Compose the admin dashboard
     *
     * @return void
     */
    private function composeDashboard()
    {
        View::composer('admin.dashboard.index', function ($view) {
            $view->with([
                'categories_count' => Category::count(),
                'products_count' => Product::count(),
                'orders_count' => Order::count(),
                'users_all' => User::all()->count(),
            ]);
        });
    }

    /**
     *
     */
    private function composeAdminSidebar()
    {
        View::composer('admin.partials.sidebar', function ($view) {
            $view->with([
                'user_name' => Auth::user()->full_name,
                'admins_count' => User::role('Admin')->count(),
                'customers_count' => User::role('Customer')->count(),
                'superAdmin_count' => User::role('SuperAdmin')->count(),
                'users_all' => User::all()->count(),
                'role_names'=>Auth::user()->getRoleNames(),
            ]);
        });
    }

    /**
     *
     */
    private function composeAdminHeader()
    {
        View::composer('admin.partials.header', function ($view) {
            $view->with([
                'user_name' => Auth::user()->full_name,
            ]);
        });
    }


    private function composeSiteNav()
    {

        View::composer('site.partials.nav', function ($view) {
            $view->with(['categories'=> Category::orderByRaw('-name ASC')->get()->nest()]);
        });
    }
}
