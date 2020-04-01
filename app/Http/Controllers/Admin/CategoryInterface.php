<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreCategory;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

interface CategoryInterface
{
    /**
     * Display a listing of the categories.
     *
     * @return View
     */
    public function index();

    /**
     * Show the form for creating a new category.
     *
     * @return View
     */
    public function create();

    /**
     * Store a newly created category in storage.
     *
     * @param StoreCategory $request
     * @return RedirectResponse
     */
    public function store(StoreCategory $request);

    /**
     * Display the specified category.
     *
     * @param Category $category
     * @return View
     */
    public function show(Category $category);

    /**
     * Show the form for editing the specified category.
     *
     * @param Category $category
     * @return View
     */
    public function edit(Category $category);

    /**
     * Update the specified category in storage.
     *
     * @param StoreCategory $request
     * @param Category $category
     * @return View
     */
    public function update(StoreCategory $request, Category $category);

    /**
     * Restore soft deleted category from storage.
     *
     * @param $category_slug
     * @return RedirectResponse
     * @throws \Exception
     */
    public function restore($category_slug);

    /**
     * Soft delete (moving to trash) the specified category from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Category $category);

    /**
     * Force delete (permanently delete) the specified category from storage.
     *
     * @param $category_slug
     * @return RedirectResponse
     * @throws \Exception
     */
    public function forceDestroy($category_slug);
}
