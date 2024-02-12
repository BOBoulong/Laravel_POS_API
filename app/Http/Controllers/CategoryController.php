<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display all Categories in the database.
     */
    public function getAllCategory()
    {
        $categories = Category::all();
        if($categories){
            return response()->json([
                'message' => 'All Categories',
                'data' => $categories], 200);
        }
        return response()->json(['message' => 'No Category Found'], 404);
    }
    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Create and store a new category into the database.
     */
    public function createCategory(Request $request)
    {
        $request -> validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        // Create The Category.
        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        if($category->save()){
            return response()->json([
                'message' => 'Category created successfully',
                'category' => $category], 201);
        }
            return response()->json(['message' => 'Category not created'], 404);

    }



    /**
     * Display Category by id.
     */
    public function getCategoryById(string $id)
    {
        $category = Category::find($id);
        if($category) {
            return response()->json([
                'message' => 'Category found',
                'category' => $category], 200);
        }
            return response()->json(['message' => 'Category not found'], 404);
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     //
    // }

    /**
     * Update the category by id into the database.
     */
    public function updateCategoryById(Request $request, string $id)
    {
        $request->validate([
            'name' =>'required|max:255',
            'description' =>'required|max:255',
        ]);
        $category = Category::find($id);
        if($category) {
            $category->name = $request->name;
            $category->description = $request->description;
            $category->save();
            return response()->json([
                'message' => 'Category updated successfully',
                'category' => $category], 200);
        }
        return response()->json(['message' => 'Category not found'], 404);

    }


    /**
     * Remove the category by id from the database.
     */
    public function deleteCategoryById(string $id)
    {
        $category = Category::find($id);
        if($category) {
            $category->delete();
            return response()->json([
                'message' => 'Category deleted successfully',
                'deleted_category'=>$category], 200);
        }
        return response()->json(['message' => 'Category not found'], 404);
    }
}