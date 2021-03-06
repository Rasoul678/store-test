<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProduct;
use App\Models\Category;
use App\Models\Enums\ProductStatus;
use App\Models\Product;
use Illuminate\Auth\Access\AuthorizationException;
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
            $products = Product::onlyTrashed()->where('status', $status)->orderBy('deleted_at', 'desc')->paginate(8);
        } else {
            $products = Product::withoutTrashed()->where('status', $status)->orderBy('updated_at', 'desc')->paginate(8);
        }
        $products->load('getCategories');
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @return View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Product::class);
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
     * @throws AuthorizationException
     */
    public function store(StoreProduct $request)
    {
        $this->authorize('create', Product::class);
        $product = Product::create($request->validated());
        foreach ($request->validated()['categories'] as $item) {
            $category = Category::where('slug', $item)->first();
            $product->getCategories()->attach($category);
        }
        flash($product->name . ' has been created successfully.');
//        $product->addMediaFromUrl($request->validated()['image_url'])->toMediaCollection('image');
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
     * @throws AuthorizationException
     */
    public function edit(Product $product)
    {
        $this->authorize('update', $product);
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
        $this->authorize('update', $product);
        $product_name = $product->name;
        $data = $request->validated();
        $product->update($data);
        $product->getCategories()->detach();
        foreach ($data['categories'] as $item) {
            $category = Category::where('slug', $item)->first();
            $product->getCategories()->attach($category);
        }
        $product->save();
//        $product->clearMediaCollection('image');
//        $product->addMediaFromUrl($request->validated()['image_url'])->toMediaCollection('image');
        flash($product_name . ' has been updated successfully.');
        return view('admin.products.show')
            ->with(compact('product'));
    }

    /**
     * Restore soft deleted product from storage.
     *
     * @param $product_id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function restore($product_id)
    {
        $product = Product::withTrashed()->where('id', $product_id)->firstOrFail();
        $this->authorize('restore', $product);
        $product->restore();
        flash($product->name . ' has been restored successfully.');
        return redirect()->back();
    }

    /**
     * Soft delete (move to trash) the specified product.
     *
     * @param Product $product
     * @return RedirectResponse
     * @throws AuthorizationException
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
        $product_name = $product->name;
        $product->delete();
        flash($product_name . ' has been deleted successfully.');
        return redirect()->back();
    }

    /**
     * Force delete (permanently delete) the specified product.
     *
     * @param $product_id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function forceDestroy($product_id)
    {
        $product = Product::withTrashed()->where('id', $product_id)->firstOrFail();
        $this->authorize('forceDelete', $product);
        $product_name = $product->name;
        $product->forceDelete();
        flash($product_name . ' has been deleted permanently.');
        return redirect()->back();
    }
}
