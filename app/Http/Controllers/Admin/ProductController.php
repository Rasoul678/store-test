<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller implements ProductControllerInterface
{
    /**
     * Display a listing of the products.
     *
     * @return View
     */
    public function index()
    {
        $products = Product::orderBy('updated_at', 'asc')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @return View
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'desc')->get();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created product in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $product = new Product;
        $product->name = $data['name'];
        $product->price = $data['price'];
        $product->type = $data['type'];
        $product->description = $data['description'];
        $product->save();
        foreach ($data['categories'] as $item) {
            $category = Category::where('slug', $item)->first();
            $product->getCategories()->attach($category);
        }
        return redirect(route('admin.products.index'));
    }

    /**
     * Display the new specified product.
     *
     * @param Product $product
     * @return View
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Display a form for editing the specified product.
     *
     * @param Product $product
     * @return View
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('name', 'desc')->get();
        return view('admin.products.edit')
            ->with(compact('product'))
            ->with(compact('categories'));
    }

    /**
     * Store the updated information of the specified product.
     *
     * @param Request $request
     * @param Product $product
     * @return View
     */
    public function update(Request $request, Product $product)
    {
        $product_name = $product->name;
        $data = $this->validatedData($request);
        $product->update($data);
        $product->getCategories()->detach();
        foreach ($data['categories'] as $item) {
            $category = Category::where('slug', $item)->first();
            $product->getCategories()->attach($category);
        }
        $product->save();
        flash($product_name . ' has been updated successfully.');
        return view('admin.products.show')
            ->with(compact('product'));
    }

    /**
     * Soft delete (move to trash) the specified product.
     *
     * @param Product $product
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product_name = $product->name;
        $product->delete();
        flash($product_name . ' has been deleted successfully.');
        return redirect(route('admin.products.index'));
    }

    /**
     * Force delete (permanently delete) the specified product.
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function forceDestroy(Product $product)
    {
        $product_name = $product->name;
        $product->forceDelete();
        flash($product_name . ' has been deleted permanently.');
        return redirect(route('admin.products.index'));
    }


    /**
     * A method for validating the data of request for creating and editing forms.
     *
     * @param $request
     * @return mixed
     */
    protected function validatedData($request)
    {
        $data = $request->validate([
            'name' => 'required',
            'categories.*' => 'required',
            'description' => 'nullable',
            'type' => 'nullable',
            'price' => 'nullable|numeric',
        ]);
        return $data;
    }
}
