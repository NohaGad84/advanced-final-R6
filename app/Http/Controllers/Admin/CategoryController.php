<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Topic;

use App\Traits\Common;

class CategoryController extends Controller 
{
    use Common;
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }
    public function create()
    {

        return view('admin.add_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $data = $request->validate([
        'category_name' => 'required|string|unique:categories',
    ]);

    $existingCategory = Category::where('category_name', $data['category_name'])->first();
    if ($existingCategory) {
    return redirect()->back()->withErrors(['category_name' => 'Category name already exists.']);
    }

    Category::create($data);

    return redirect()->route('admin.categories.index')->with('success', 'Category added successfully!');
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id); 
        $topics = $category->topics;
      

    return view('admin.categories', compact('category', 'topics'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::select('id', 'category_name')->get();
    
        return view('admin.edit_category', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $data = $request->validate([
        'category_name' => 'required|string',
    ]);

    $category = Category::findOrFail($id);
    $category->update($data);

    return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    
public function destroy(Category $category)
{
    $category->delete();

    return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully!');
}

public function showDeleted()
{
    $deletedCategories = Category::onlyTrashed()->get();
    return view('admin.categories.deleted', compact('deletedCategories'));
}

public function restore(Category $category)
{
    $category->restore();

    return redirect()->route('admin.categories.index')->with('success', 'Category restored successfully!');
}

public function forceDelete(Category $category)
{
    $category->forceDelete();

    return redirect()->route('admin.categories.index')->with('success', 'Category deleted permanently!');
}

}

