<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Fetch all categories from the database
        $categories = Category::all();

        // Pass the categories data to the view
        return view('admin.category', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_image' => 'nullable',
        ]);

        // Create a new Category instance
        $category = new Category();
        $category->name = $request->category_name;

        // Handle the image upload
        if ($request->hasFile('category_image')) {
            $category->image = $request->file('category_image')->store('category_images', 'public');
        }

        // Save the category to the database
        $category->save();

        // Redirect back with a success message
        return redirect()->route('admin.category')->with('success', 'Category created successfully.');
    }

    public function destroy($id)
    {
        // Find the category by ID
        $category = Category::findOrFail($id);

        // Delete the category image from storage if it exists
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        // Delete the category from the database
        $category->delete();

        // Redirect back with a success message
        return redirect()->route('admin.category')->with('success', 'Category deleted successfully.');
    }
    public function update(Request $request, Category $category)
    {
        // Validate the request data
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_image' => 'nullable',
        ]);

        // Update category name
        $category->name = $request->input('category_name');

        // Handle file upload
        if ($request->hasFile('category_image')) {
            // Delete old image if exists
            if ($category->image && \Storage::exists('public/' . $category->image)) {
                \Storage::delete('public/' . $category->image);
            }

            // Store the new image
            $imagePath = $request->file('category_image')->store('categories', 'public');
            $category->image = $imagePath;
        }

        // Save the updated category
        $category->save();

        return redirect()->route('admin.category')->with('success', 'Category updated successfully.');
    }
}
