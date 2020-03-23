<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return View
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
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
        $category = Category::where('slug', $data['categories'])->first();
        $product->getCategories()->attach($category);
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('product.edit')
            ->with(compact('product'))
            ->with(compact('categories'));
    }

    public function update(Request $request, Product $product)
    {
        $product_name = $product->name;
        $data = $this->validatedData($request);
        $product->update($data);
        $product->getCategories()->detach();
        $category = Category::where('slug', $data['categories'])->first();
        $product->getCategories()->attach($category);
        $product->save();
        flash($product_name . ' has been updated successfully.');
        return view('product.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        $product_name = $product->name;
        $product->delete();
        flash($product_name . ' has been deleted successfully.');
        return redirect(route('products.index'));
    }

    protected function validatedData($request)
    {
        $data = $request->validate([
            'name' => 'required',
            'categories' => 'required',
            'description' => 'nullable',
            'type' => 'nullable',
            'price' => 'nullable|numeric',
        ]);
        return $data;
    }
}
