<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategory;
use App\Models\Category;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller implements CategoryInterface
{
    /**
     * Display a listing of the categories.
     *
     * @return View
     */
    public function index()
    {
        if (request()->has('only_trash')) {
            $categories = Category::onlyTrashed()->where('slug', '!=', 'root')->orderBy('deleted_at', 'desc')->paginate(8);
        } else {
            $categories = Category::withoutTrashed()->where('slug', '!=', 'root')->orderBy('updated_at', 'desc')->paginate(8);
        }
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     *
     * @return View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Category::class);
        $categories = Category::orderBy('name', 'ASC')
            ->get()
            ->nest()
            ->listsFlattened('name');
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created category in storage.
     *
     * @param StoreCategory $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(StoreCategory $request)
    {
        $this->authorize('create', Category::class);
        $category = Category::create($request->validated());
        flash($category->name . ' has been created successfully.')->success();
        return redirect(route('admin.categories.index'));
    }

    /**
     * Display the specified category.
     *
     * @param Category $category
     * @return View
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }


    /**
     * Show the form for editing the specified category.
     *
     * @param Category $category
     * @return View
     * @throws AuthorizationException
     */
    public function edit(Category $category)
    {
        $this->authorize('update', $category);
        $targetCategory = Category::findOrFail(request('id'));
        $categories = Category::orderBy('name', 'ASC')
            ->get()
            ->nest()
            ->listsFlattened('name');

        return view('admin.categories.edit', compact('categories', 'category', 'targetCategory'));
    }

    /**
     * Update the specified category in storage.
     *
     * @param StoreCategory $request
     * @param Category $category
     * @return View
     * @throws AuthorizationException
     */
    public function update(StoreCategory $request, Category $category)
    {
        $this->authorize('update', $category);
        $category->update($request->validated());
        flash($category->name . ' has been updated successfully.');
        return view('admin.categories.show')
            ->with(compact('category'));
    }

    /**
     * Restore soft deleted category from storage.
     *
     * @param $category_slug
     * @return RedirectResponse
     * @throws \Exception
     */
    public function restore($category_slug)
    {
        $category = Category::withTrashed()->where('slug', $category_slug)->firstOrFail();
        $this->authorize('restore', $category);
        $category->restore();
        flash($category->name . ' has been restored successfully.');
        return redirect()->back();
    }

    /**
     * Soft delete (moving to trash) the specified category from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $this->authorize('delete', $category);
        $name = $category->name;
        $category->delete();
        flash($name . ' has been deleted successfully.');
        return redirect()->back();
    }

    /**
     * Force delete (permanently delete) the specified category from storage.
     *
     * @param $category_slug
     * @return RedirectResponse
     * @throws \Exception
     */
    public function forceDestroy($category_slug)
    {
        $category = Category::withTrashed()->where('slug', $category_slug)->first();
        $this->authorize('forceDelete', $category);
        $name = $category->name;
        $category->forceDelete();
        flash($name . ' has been deleted permanently.');
        return redirect()->back();
    }

}
