<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
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
        $products = Product::orderBy('updated_at', 'asc')->paginate(12);
        return view('site.pages.homepage', compact('products'));
    }
    
    
    public function search(Request $request)
    {
        $search = $request->get('search');
        $products = Product::where('name', 'like', '%'.$search.'%')->paginate(12);
        return view('site.pages.homepage', compact('products'));
    }
}
