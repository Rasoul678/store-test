<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new categories.
     *
     * @return View
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created categories in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $category = Category::create($this->validatedData($request));
        flash($category->name . ' has been created successfully.')->success();
        return redirect(route('categories.index'));
    }

    /**
     * Display the specified categories.
     *
     * @param Category $category
     * @return View
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified categories.
     *
     * @param Category $category
     * @return View
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified categories in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return View
     */
    public function update(Request $request, Category $category)
    {
        $category->update($this->validatedData($request));
        flash($category->name . ' has been updated successfully.');
        return view('categories.show', compact('category'));
    }

    /**
     * Remove the specified categories from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $name = $category->name;
        $category->delete();
        flash($name . ' has been deleted successfully.');
        return redirect(route('categories.index'));
    }

    /**
     * Validate every request to Category.
     *
     * @param $request
     * @return mixed
     */
    private function validatedData($request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => '',
        ]);
        return $data;
    }
}
