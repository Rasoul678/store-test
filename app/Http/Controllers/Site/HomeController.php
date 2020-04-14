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
        $allProducts = Product::inRandomOrder()->paginate(8);
        return view('site.pages.homepage', compact('allProducts', 'categories'));
    }
    
    
    public function search(Request $request)
    {
        $categories = Category::orderBy('updated_at', 'asc')->get();
        $search = $request->get('search');
        $allProducts = Product::where('name', 'like', '%'.$search.'%')->paginate(12);
        return view('site.pages.homepage', compact('allProducts', 'categories'));
    }
}
