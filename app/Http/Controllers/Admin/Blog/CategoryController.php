<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\Admin\Blog\CategoryRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch categories with their post count (needed for deletion check)
        $categories = Category::withCount('posts')->latest()->paginate(10);
        return view('admin.blog.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $category = new Category();
        return view('admin.blog.categories.create', compact('category'));
    }

    /**
     * Store a newly created category in storage.
     * @param CategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        
        // Handle slug generation if not provided, ensuring uniqueness
        $data['slug'] = Str::slug($data['slug'] ?? $data['name']);
        
        Category::create($data);

        return redirect()->route('admin.blog.categories.index')->with('success', 'Category created successfully!');
    }

    /**
     * Show the form for editing the specified category.
     * @param Category $category
     * @return \Illuminate\View\View
     */
    public function edit(Category $category)
    {
        return view('admin.blog.categories.edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     * @param CategoryRequest $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        
        // Handle slug generation if not provided
        $data['slug'] = Str::slug($data['slug'] ?? $data['name']);
        
        $category->update($data);

        return redirect()->route('admin.blog.categories.index')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified category from storage.
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        // Re-load the post count before deletion check
        $category->loadCount('posts');

        // Prevent deletion if the category has associated posts
        if ($category->posts_count > 0) {
            return redirect()->route('admin.blog.categories.index')
                             ->with('error', 'Cannot delete category. It has ' . $category->posts_count . ' associated posts.');
        }

        $category->delete();

        return redirect()->route('admin.blog.categories.index')->with('success', 'Category deleted successfully!');
    }
}