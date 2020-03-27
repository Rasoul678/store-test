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
     */
    private function composeDashboard()
    {
        View::composer('admin.dashboard.index', function ($view) {
            $view->with('categories', Category::all());
        });
    
        View::composer('admin.dashboard.index', function ($view) {
            $view->with('products', Product::all());
        });
    
        View::composer('admin.dashboard.index', function ($view) {
            $view->with('orders', Order::all());
        });
    }
}
