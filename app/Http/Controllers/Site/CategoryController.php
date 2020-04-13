<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Enums\ProductStatus;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     *  Show
     *
     * @param $slug
     * @return View
     */
    public function show($slug)
    {
        $category = Category::where('slug', $slug)
            ->with([
                'getProducts' => function ($query) {
                    $query->where('status', ProductStatus::ACTIVE)->paginate(12);
                }
            ])
            ->first();

        $category_link=$category->getProducts()->paginate(12);

        return view('site.pages.category')
        ->with(compact('category'))
        ->with(compact('category_link'));
    }
}
