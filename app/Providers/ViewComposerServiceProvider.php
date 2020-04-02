<?php

namespace App\Providers;

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
            ]);
        });
    }
}
