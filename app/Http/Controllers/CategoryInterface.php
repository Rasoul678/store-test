<?php

namespace App\Http\Controllers;

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
     * Show the form for creating a new categories.
     *
     * @return View
     */
    public function create();

    /**
     * Store a newly created categories in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request);

    /**
     * Display the specified categories.
     *
     * @param Category $category
     * @return View
     */
    public function show(Category $category);

    /**
     * Show the form for editing the specified categories.
     *
     * @param Category $category
     * @return View
     */
    public function edit(Category $category);

    /**
     * Update the specified categories in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return View
     */
    public function update(Request $request, Category $category);

    /**
     * Remove the specified categories from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Category $category);
}
