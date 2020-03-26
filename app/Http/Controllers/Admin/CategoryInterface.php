<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request);

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
     * @param Request $request
     * @param Category $category
     * @return View
     */
    public function update(Request $request, Category $category);

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
     * @param Category $category
     * @return RedirectResponse
     * @throws \Exception
     */
    public function forceDestroy(Category $category);
}
