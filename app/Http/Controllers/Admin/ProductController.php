<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProduct;
use App\Models\Category;
use App\Models\Enums\ProductStatus;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig;

class ProductController extends Controller implements ProductControllerInterface
{
    /**
     * Display a listing of the products.
     *
     * @return View
     */
    public function index()
    {
        $status = request()->has('status') ? request()->query('status') : 1;
        if (request()->has('only_trash')) {
            $products = Product::onlyTrashed()->where('status', $status)->orderBy('deleted_at', 'desc')->paginate(6);
        } else {
            $products = Product::withoutTrashed()->where('status', $status)->orderBy('updated_at', 'desc')->paginate(6);
        }
        $products->load('getCategories');
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
        $status = ProductStatus::toSelectArray();
        return view('admin.products.create')
            ->with(compact('categories'))
            ->with(compact('status'));
    }

    /**
     * Store a newly created product in storage.
     *
     * @param StoreProduct $request
     * @return RedirectResponse
     */
    public function store(StoreProduct $request)
    {
        $product = Product::create($request->validated());
        foreach ($request->validated()['categories'] as $item) {
            $category = Category::where('slug', $item)->first();
            $product->getCategories()->attach($category);
        }
        $product->addMediaFromUrl($request->validated()['image_url'])->toMediaCollection('image');
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
        $product->load('getCategories');
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
        $product->load('getCategories');
        $status = ProductStatus::toSelectArray();
        return view('admin.products.edit')
            ->with(compact('product'))
            ->with(compact('categories'))
            ->with(compact('status'));
    }

    /**
     * Store the updated information of the specified product.
     *
     * @param StoreProduct $request
     * @param Product $product
     * @return View
     * @throws FileCannotBeAdded
     * @throws DiskDoesNotExist
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function update(StoreProduct $request, Product $product)
    {
        $product_name = $product->name;
        $data = $request->validated();
        $product->update($data);
        $product->getCategories()->detach();
        foreach ($data['categories'] as $item) {
            $category = Category::where('slug', $item)->first();
            $product->getCategories()->attach($category);
        }
        $product->save();
        $product->clearMediaCollection('image');
        $product->addMediaFromUrl($request->validated()['image_url'])->toMediaCollection('image');
        flash($product_name . ' has been updated successfully.');
        return view('admin.products.show')
            ->with(compact('product'));
    }

    /**
     * Restore soft deleted product from storage.
     *
     * @param $product_id
     * @return RedirectResponse
     * @throws \Exception
     */
    public function restore($product_id)
    {
        $product = Product::withTrashed()->where('id', $product_id)->firstOrFail();
        $product->restore();
        flash($product->name . ' has been restored successfully.');
        return redirect(route('admin.products.index'));
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
     * @param $product_id
     * @return RedirectResponse
     */
    public function forceDestroy($product_id)
    {
        $product = Product::withTrashed()->where('id', $product_id)->firstOrFail();
        $product_name = $product->name;
        $product->forceDelete();
        flash($product_name . ' has been deleted permanently.');
        return redirect(route('admin.products.index'));
    }
}
