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
        $this->composeSidebar();
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
                'admins_count' => User::role('Admin')->count(),
                'customers_count' => User::role('Customer')->count(),
            ]);
        });
    }
    
    private function composeSidebar()
    {
        View::composer('admin.partials.sidebar', function ($view) {
            $view->with([
                'admin_name' => Auth::user()->full_name,
            ]);
        });
    }
}
