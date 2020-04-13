<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Populate Products on homepage.
     *
     * @return View
     */
    public function index()
    {
        $categories = Category::orderBy('updated_at', 'asc')->get();
        $AllProducts = Product::inRandomOrder()->paginate(8);
        return view('site.pages.homepage', compact('AllProducts', 'categories'));
    }
    
    
    public function search(Request $request)
    {
        $search = $request->get('search');
        $products = Product::where('name', 'like', '%'.$search.'%')->paginate(12);
        return view('site.pages.homepage', compact('products'));
    }
}
