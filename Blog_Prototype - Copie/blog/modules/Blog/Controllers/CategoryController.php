<?php

namespace Modules\Blog\Controllers;

use Modules\Blog\Models\Category;
use Illuminate\Http\Request;
use Modules\Core\Controllers\Controller;

class CategoryController extends Controller
{
    // Show all categories in the admin panel
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    // Show the form to create a new category
    public function create()
    {
        return view('admin.categories.create');
    }

    // Store a newly created category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    // Show the form to edit an existing category
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // Update an existing category
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // Delete a category
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
