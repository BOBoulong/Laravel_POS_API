<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Get all categories.
     */
    public function getAllCategories()
    {
        // Find all categories.
        $categories = Category::all();
        if($categories->isEmpty()){
            // If there are no categories, return a 404 error.
            return response()->json([
                'message' => 'No Categories found!'
            ], 404);
        }
        // If categories found, return a 200 response with the categories.
        return response()->json([
            'message' => 'All Categories.',
            'data' => $categories
        ], 200);
    }



    /**
     * Create and store a new category.
     */
    public function createCategory(Request $request)
    {
        // Validate the request
        $validatedData =$request -> validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        // Create a new category
        $category = Category::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
        ]);

        if ($category) {
            // Return a success response if category creation was successful
            return response()->json([
                'message' => 'Category created successfully.',
                'category' => $category
            ], 201);
        }

        // Return an error response if category creation failed
        return response()->json(['message' => 'Category not created!'], 500);

    }



    /**
     * Get a category by ID
     */
    public function getCategoryById(string $id)
    {
        // Find the category by ID
        $category = Category::find($id);
        if($category) {
            // If the category is found, return it.
            return response()->json([
                'message' => 'Category found.',
                'category' => $category], 200);
        }
        // If the category is not found, return a 404 error.
        return response()->json(['message' => 'Category not found!'], 404);
    }


    /**
     * Update a category by ID.
     */
    public function updateCategoryById(Request $request, string $id)
    {
        // Validate incoming data
        $request->validate([
            'name' =>'required|max:255',
            'description' =>'required|max:255',
        ]);
        // Find the category by ID
        $category = Category::find($id);

        // If category is found, update it
        if($category) {
            $category->name = $request->name;
            $category->description = $request->description;
            $category->save();
        // Return a JSON response update success
        return response()->json([
            'message' => 'Category updated successfully.',
            'category' => $category
        ], 200);
        }
        // If the category is not found, return a 404 error
        return response()->json(['message' => 'Category not found!'], 404);
    }


    /**
     * Remove a category by ID
     */
    public function deleteCategoryById(string $id)
    {
        // Find the category by ID.
        $category = Category::find($id);

        // Delete the category
        if($category) {
            $category->delete();
            // Return a JSON response indicating that the category has been deleted
            return response()->json([
                'message' => 'Category deleted successfully.',
                'deleted_category'=>$category], 200);
        }
        // Return a 404 response indicating that the category was not found
        return response()->json(['message' => 'Category not found!'], 404);
    }
}
